#include "udpthread.h"

UDPThread::UDPThread(MainWindow *mainW,QObject *parent) :
    QThread(parent)
{
    mainWindow=mainW;
    receiver=new QUdpSocket(this);
    receiver->bind(8888);
    connect(receiver,SIGNAL(readyRead()),this,SLOT(processPendingDatagram()));
    logFile=new QFile("logFile.txt");
    logFile->open(QIODevice::Text | QIODevice::Append | QIODevice::WriteOnly);
}

void UDPThread::run()
{
    if(!isFirst)
    {
        mainWindow->SetLineText("Start!");
        isFirst=true;
    }    
}

void UDPThread::processPendingDatagram()
{
    while(receiver->hasPendingDatagrams())
    {
        QByteArray datagram;
        datagram.resize(receiver->pendingDatagramSize());
        receiver->readDatagram(datagram.data(),datagram.size());
        mainWindow->SetLineText(datagram);
        QDateTime currentTime = QDateTime::currentDateTime();
        QString str = currentTime.toString("yyyy-MM-dd hh:mm:ss ");
        QTextStream logOut(logFile);
        logOut<<str<<"Receive Datagram:"<<datagram<<endl;

        QTextStream dataStream(&datagram, QIODevice::ReadOnly);
        QString Data=currentTime.toString("yyyy-MM-dd");
        QString Time=currentTime.toString("hh:mm:ss");
        QString Temperature;
        QString Quality;
        dataStream >> Temperature >> Quality;


        QSqlDatabase dataBase=QSqlDatabase::addDatabase("QMYSQL");
        dataBase.setHostName("localhost");
        dataBase.setDatabaseName("Sensor");
        dataBase.setUserName("root");
        dataBase.setPassword("123");
        dataBase.open();
        QSqlQuery sqlQuery(dataBase);
        sqlQuery.exec("SELECT * FROM location");
        sqlQuery.last();
        QString sqlCmd;
        if(sqlQuery.at()<0)
            sqlCmd=QString("INSERT INTO location (No,Date,Time,Latitude,Longitude) VALUES (%1,'%2','%3','%4','%5')").arg(1).arg(Data).arg(Time).arg(Temperature).arg(Quality);
            //sqlCmd=QString("INSERT INTO record (No,Date,Time,Temperature,Quality) VALUES (%1,'%2','%3','%4','%5')").arg(1).arg(Data).arg(Time).arg(Temperature).arg(Quality);
        else
            sqlCmd=QString("INSERT INTO location (No,Date,Time,Latitude,Longitude) VALUES (%1,'%2','%3','%4','%5')").arg(sqlQuery.at()+2).arg(Data).arg(Time).arg(Temperature).arg(Quality);
            //sqlCmd=QString("INSERT INTO record (No,Date,Time,Temperature,Quality) VALUES (%1,'%2','%3','%4','%5')").arg(sqlQuery.at()+2).arg(Data).arg(Time).arg(Temperature).arg(Quality);
        logOut<<str<<"SQL Command:"<<sqlCmd<<endl;
        sqlQuery.exec(sqlCmd);
        dataBase.close();
        /*
        dataBase.setDatabaseName("Data.db");
        dataBase.open();
        QSqlQuery sqlQuery(dataBase);
        sqlQuery.exec("SELECT * FROM record");
        sqlQuery.last();
        QString sqlCmd;
        if(sqlQuery.at()<0)
            sqlCmd=QString("INSERT INTO record (No,Data,Time,Temperature,Quality) VALUES (%1,'%2','%3','%4','%5')").arg(1).arg(Data).arg(Time).arg(Temperature).arg(Quality);
        else
            sqlCmd=QString("INSERT INTO record (No,Data,Time,Temperature,Quality) VALUES (%1,'%2','%3','%4','%5')").arg(sqlQuery.at()+2).arg(Data).arg(Time).arg(Temperature).arg(Quality);
        sqlQuery.exec(sqlCmd);
        dataBase.close();
        */
    }
}
