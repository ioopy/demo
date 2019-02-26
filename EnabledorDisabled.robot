*** Settings ***
Documentation    Suite description
Library    Selenium2Library
Library    OperatingSystem

*** Variables ***
${SERVER}       http://localhost:8081/ROOT/
${BROWSER}      gc
${USERNAME}     Warangkhanaice
${PASSWORD}     1234
${BIRTHDAY}     7/08/2536
${PHONENUMBER}  0981987893
${ADDRESS}      Nakhonrachasima
${LOCATION}     Korat

*** Keywords ***
  Open Browser to Login page
     Open Browser    ${SERVER}       ${BROWSER}
     Click Element  name=username
*** Keywords ***
  Open Browser to Login page
     Open Browser    ${SERVER}       ${BROWSER}
     Click Element  name=username
lick My profile
     Click Link     xpath=/html/body/div/div[1]/div/div[2]/ul/li/a

     Click Link     xpath=/html/body/div/div[1]/div/div[2]/ul/li/ul/li[1]/a

Click edit
     Press Key        xpath=//*[@id="edit-btn"]   \\13
     Click Element   xpath=/html/body/div/div[3]/div[2]/div/div/div[2]/form/div[1]/div[2]/div/div/div/label[2]/span
     Click Element    name=birthDate
     Input Text       name=birthDate      ${BIRTHDAY}
     Input Text       name=phoneNumber    ${PHONENUMBER}
     Input Text       name=address        ${ADDRESS}
     Input Text                   name=location  ${LOCATION}
     Element Should Be Disabled   name=fbID
     Element Should Be Disabled   name=fbAccount
     Press Key  xpath=/html/body/div/div[3]/div[2]/div/div/div[2]/form/div[2]/div/div/a/button   \\13#Cancel
    #Press Key    xpath=//*[@id="edit-submit-btn"]   \\13  #Submit
    Close Browser
*** Test Cases ***
  Sign in page success
     Open Browser to Login page
     Input username in textbox
     Input password in textbox
     Click My profile
     Click edit




