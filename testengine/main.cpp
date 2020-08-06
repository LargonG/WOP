#include <iostream>
#include <fstream>
#include <thread>
#include <ctime>
#include <windows.h>

using namespace std;

//константы передаются из каких то файлов
const string prog_name = "prog";
const size_t time_limit = 1000;
const size_t maxmem = 64*1024*1024;//64 мбайта

bool test_running = false;

size_t count_test_sets()
{
    size_t k = 1;
    fstream f("in"+to_string(k)+".txt");
    while (f.is_open())
    {
        f.close();
        f.open("in"+to_string(++k)+".txt");
    }
    return k-1;
}

void run_test(size_t num)
{
    test_running = true;
    system((prog_name+" <in"+to_string(num)+".txt >out.txt").c_str());
    test_running = false;
}

int main()
{
    size_t test_sets = count_test_sets();
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
            system("@echo off for /f %a in ('wmic process where \"name=\'prog.exe\'\" get WorkingSetSize^|findstr [0-9]\') do (set \"var=%a\" echo %a >curmem.txt");
            ifstream fin("curmem.txt");
            size_t memory;
            fin >> memory;
            fin.close();
            //cout << "Memory=" << memory / 1024 << " kbytes\n";
            if (memory > maxmem)
            {
                ML = true;
                break;
            }
        }
        system("taskkill /f /IM prog.exe");
        th.join();
        ofstream fout(("report"+to_string(i)+".txt").c_str());
        if (TL)
        {
            fout << "TL";
        }
        else if (ML)
        {
            fout << "ML";
        }
        else
        {
            system(("fc out.txt ans"+to_string(i)+".txt >NUL && echo OK >comp.txt || echo WA >comp.txt").c_str());
            ifstream checkans("comp.txt");
            string status;
            checkans >> status;
            checkans.close();
            if (status == "OK")
                fout << "OK";
            else
                fout << "WA";
        }
        fout.close();
    }
    system("pause");
    //все выводы нужно делать в файлы
    return 0;
}
