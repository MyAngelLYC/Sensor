#-------------------------------------------------
#
# Project created by QtCreator 2013-04-21T14:41:24
#
#-------------------------------------------------

QT       += core gui
QT       += network
QT       += sql

greaterThan(QT_MAJOR_VERSION, 4): QT += widgets

TARGET = ServerGUI
TEMPLATE = app


SOURCES += main.cpp\
        mainwindow.cpp \
    udpthread.cpp

HEADERS  += mainwindow.h \
    udpthread.h

FORMS    += mainwindow.ui
