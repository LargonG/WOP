#include <iostream>
#include <vector>
#include <fstream>
#include <thread>
#include <ctime>
#include <windows.h>

using namespace std;

//константы передаются из каких то файлов
size_t time_limit;
size_t maxmem;//64 мбайта
size_t test_sets;
string submit_path;
string test_path;
string language;

bool test_running = false;

vector<string> split(string str, string delimiter)
{
    vector<string> ans;
    auto p = str.find(delimiter);
    auto p1 = 0;
    while (p != string::npos)
    {
        ans.push_back(str.substr(p1, p - p1));
        p1 = p + delimiter.length();
        p = str.find(delimiter, p + delimiter.length());
    }
    ans.push_back(str.substr(p1, str.length() - p1));
    return ans;
}

void load_config()
{
    ifstream fin("testengine.cfg");
    while (!fin.is_open()) fin.open("testengine.cfg");

    //информация для компиляции/тестов
    string task_id, submit_id, lang;
    while (!fin.eof())
    {
        string line;
        getline(fin, line);
        if (line == "")
            break;
        string param = split(line, ":")[0], value = split(line, ":")[1];

        while (value[0] == ' ')
            value.erase(0, 1);

        if (param == "task_id")
            task_id = value;

        if (param == "submit_id")
            submit_id = value;

        if (param == "lang")
            lang = value;
    }
    fin.close();
    submit_path = "submits/"+task_id+"/"+submit_id;
    test_path = "tests/"+task_id;
    language = lang;

    //информация по TL, ML, кол-ву тестовых наборов
    fin.open(test_path+"/problem.cfg");
    while (!fin.is_open()) fin.open(test_path+"/problem.cfg");

    while (!fin.eof())
    {
        string line;
        getline(fin, line);

        if (line == "")
            break;

        string param = split(line, ":")[0], value = split(line, ":")[1];

        while (value[0] == ' ') value.erase(0, 1);

        if (param == "TL")
            time_limit = atoi(value.c_str());

        if (param == "ML")
            maxmem = atoi(value.c_str());

        if (param == "test_sets")
            test_sets = atoi(value.c_str());
    }
    fin.close();
}

void run_test(size_t num)
{
    test_running = true;
    SetCurrentDirectory(submit_path.c_str());
    system(("prog <../../../"+test_path+"/in"+to_string(num)+".txt >../../../"+submit_path+"/out.txt").c_str());
    test_running = false;
    SetCurrentDirectory("../../../");
}

int main()
{
    load_config();
    //cout << submit_path << " " << language << endl;
    system(("g++ -o "+submit_path+"/prog "+submit_path+"/main."+language+"").c_str());
    ifstream exe((submit_path+"/prog.exe").c_str());
    if (!exe.is_open())
    {
        ofstream fout((submit_path+"/compilation.txt").c_str());
        cout << "compilation error";
        fout.close();
        system("pause");
        return 0;
    }

    for (int i = 1; i <= test_sets; ++i)
    {
        thread th(run_test, i);//выполнение на 1 тестовом наборе
        while (!test_running){}
        //system("pause");
        size_t start_time = clock();
        bool TL = false, ML = false;
        while (!TL && !ML)
        {
            if (!test_running)
                break;
            //мониторинг времени
            if (clock() - start_time > time_limit)
            {
                TL = true;
                break;
            }
            //мониторинг памяти
            system("for /f %a in ('wmic process where \"name=\'prog.exe\'\" get WorkingSetSize^|findstr [0-9]\') do echo %a >curmem.txt");
            ifstream fin(submit_path+"curmem.txt");
            if (fin.is_open())
            {
                size_t memory;
                fin >> memory;
                fin.close();
            //cout << "Memory=" << memory / 1024 << " kbytes\n";
                if (memory > maxmem)
                {
                    ML = true;
                    break;
                }
                fin.close();
            }
        }
        system("taskkill /f /IM prog.exe");
        th.join();
        ofstream fout((submit_path+"/report"+to_string(i)+".txt").c_str());
        if (TL)
        {
            fout << "TL";
            //cout << "test " << i << " TL\n";
            break;
        }
        else if (ML)
        {
            fout << "ML";
            //cout << "test " << i << " ML\n";
            break;
        }
        else
        {
            SetCurrentDirectory(submit_path.c_str());
            system(("fc out.txt ../../../"+test_path+"/ans"+to_string(i)+".txt >NUL && echo OK >"+"comp.txt || echo WA >"+"comp.txt").c_str());
            SetCurrentDirectory("../../../");
            ifstream checkans(submit_path+"/comp.txt");
            string status;
            checkans >> status;
            checkans.close();
            if (status == "OK")
            {
                fout << "OK";
                //cout << "test " << i << "OK\n";
            }
            else
            {
                fout << "WA";
                //cout << "test " << i << "WA\n";
                break;
            }
        }
        fout.close();
    }
    return 0;
}
