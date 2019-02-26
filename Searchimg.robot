*** Settings ***
Library    Selenium2Library
Library    OperatingSystem


*** Variables ***
${SERVER}    https://www.google.com/
${BROWSER}    gc

*** Keywords ***
Open browser in google chrome
       Open Browser    ${SERVER}    ${BROWSER}
       Input Text    name=q    python
       Click Button  name=btnK
Search image in google
       Click Link      xpath=//*[@id="hdtb-msb-vis"]/div[2]/a
       Click Image     id=AtEE8pQembIKjM:


*** Test Cases ***
Open browser
    Open browser in google chrome
