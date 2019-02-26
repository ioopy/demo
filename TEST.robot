*** Settings ***
Library    Selenium2Library
Library    OperatingSystem

*** Variables ***
${SERVER}    https://www.google.com/
${BROWSER}    gc

*** Test Cases ***
Open browser
    Open Browser  in ${SERVER}
