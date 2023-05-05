Feature: Room name and slug generation
As a developer
I want to ensure that a Room's name is properly sanitized and that its slug is generated correctly

Scenario: Creating a room with a valid name
Given I have a Room with name "Transfiguration classroom"
Then the Room's name should be "Transfiguration classroom"
And the Room's slug should be "transfiguration_classroom"

Scenario: Updating a room's name
Given I have a Room with name "Transfiguration classroom"
When I set the Room's name to "Potions classroom"
Then the Room's name should be "Potions classroom"
And the Room's slug should be "potions_classroom"

Scenario: Creating a room with a non-string name
Given I have a Room with name 123
Then an exception should be thrown with message "Room name must be a string"

Scenario: Creating a room with an empty name
Given I have a Room with name ""
Then an exception should be thrown with message "Room name must be a non-empty string"

Scenario: Creating a room with an invalid name
Given I have a Room with name "Transfiguration classroom 123"
Then an exception should be thrown with message "Slug can only contain letters and underscores"

Scenario: Generating a slug with diacritics
Given I have a Room with name "Transfiguràtion classroom"
Then the Room's slug should be "transfiguration_classroom"

Scenario: Generating a slug with spaces
Given I have a Room with name "Transfiguration classroom"
Then the Room's slug should be "transfiguration_classroom"

Scenario: Generating a slug with invalid characters
Given I have a Room with name "Transfiguration classroom 123"
Then an exception should be thrown with message "Slug can only contain letters and underscores"