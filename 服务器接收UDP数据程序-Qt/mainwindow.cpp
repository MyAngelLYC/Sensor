#include "mainwindow.h"
#include "ui_mainwindow.h"

MainWindow::MainWindow(QWidget *parent) :
    QMainWindow(parent),
    ui(new Ui::MainWindow)
{
    ui->setupUi(this);
    line=ui->lineEdit;
    QFile logFile("logFile.txt");
    logFile.open(QIODevice::Text | QIODevice::Append | QIODevice::WriteOnly);
    QDateTime time = QDateTime::currentDateTime();
    QString str = time.toString("yyyy-MM-dd hh:mm:ss ");
    QTextStream logOut(&logFile);
    logOut<<endl<<"///////////////////////////////////////////////////////"<<endl;
    logOut<<str<<"Server Software has run!"<<endl;
    logFile.close();
}

MainWindow::~MainWindow()
{
    delete ui;
}

void MainWindow::SetLineText(QString str)
{
    line->setText(str);
}
