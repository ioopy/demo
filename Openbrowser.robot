*** Settings ***
Library    Selenium2Library
Library    OperatingSystem
Library    Selenium2Library
Library    OperatingSystem
Library    Selenium2Library
Library    OperatingSystem

*** Variables ***
${SERVER}    https://www.google.com/
${BROWSER}    gc

*** Keywords ***
Open browser in google chrome
       Open Browser    ${SERVER}    ${BROWSER}

*** Test Cases ***
Open browser
    Open browser in google chrome
