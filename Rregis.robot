*** Settings ***
Library    Selenium2Library
Library    OperatingSystem


*** Variables ***
${SERVER}     https://www.facebook.com/
${BROWSER}    gc
${FIRSTNAME}  Pornsuda
${LASTNAME}   Sodsai
${PHONE}      0939801775
${PASSWORD}   1234

*** Keywords ***
Open browser in google chrome
    Open Browser    ${SERVER}    ${BROWSER}
Input text in box
    Click Element    name=firstname
    Input Text       name=firstname 	${FIRSTNAME}
    Click Element    name=lastname
    Input Text       name=lastname  	${LASTNAME}
    Click Element    name=reg_email__
    Input Text       name=reg_email__ 	${PHONE}
    Click Element    name=reg_passwd__
    Input Text       name=reg_passwd__  	${PASSWORD}
    Click Element    name=birthday_day
    Click Element    xpath=//*[@id="day"]/option[6]
    Click Element    xpath=//*[@id="month"]/option[9]
    Click Element    xpath=//*[@id="year"]/option[24]
    Click Button     id=u_0_9
    Click Button     name=websubmit



*** Test Cases ***
Open browser
    Open browser in google chrome
Click to input text
    Input text in box

