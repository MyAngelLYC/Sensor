#include "mainwindow.h"
#include "udpthread.h"
#include <QApplication>


int main(int argc, char *argv[])
{
    QApplication a(argc, argv);
    MainWindow w;
    w.show();
    UDPThread thread(&w);
    thread.start();
    return a.exec();
}
