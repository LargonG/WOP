function authorise_roll()
{
    var form = document.getElementById('authorisewindow').style;
    if (form.top == '-350px')
        form.top = '70px';
    else
        form.top = '-350px';
}
