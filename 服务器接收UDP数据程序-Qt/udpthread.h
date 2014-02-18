#ifndef UDPTHREAD_H
#define UDPTHREAD_H

#include <QThread>
#include "mainwindow.h"
#include <QtNetwork>
#include <QFile>
#include <QTextStream>
#include <QDateTime>
#include <QtSql>

class UDPThread : public QThread
{
    Q_OBJECT
public:
    explicit UDPThread(MainWindow *mainW,QObject *parent = 0);

signals:

public slots:

protected:
    bool isFirst=false;
    MainWindow *mainWindow;
    QUdpSocket *receiver;
    QFile *logFile;
    void run();

private slots:
    void processPendingDatagram();
};

#endif // UDPTHREAD_H
