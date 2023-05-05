Feature: User
As a website user
I want to be able to login with a username
So that I can post messages to the different chat rooms

Scenario: Create a new user with a valid username
Given I have entered "HarryPotter" as the username
When I create a new user with the username "HarryPotter"
Then the user should be created with the username "HarryPotter"

Scenario: Update user's username with a valid new username
Given I have a user with the username "HarryPotter"
When I update the user's username to "HarryP"
Then the user's username should be "HarryP"

Scenario: Create a new user with an empty username
Given I have entered "" as the username
When I try to create a new user with an empty username
Then an error message "Username cannot be empty" should be displayed

Scenario: Create a new user with a non-string username
Given I have entered 123 as the username
When I try to create a new user with the username 123
Then an error message "Username must be a string" should be displayed