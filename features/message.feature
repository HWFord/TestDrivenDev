Feature: Creating and modifying messages
As a user
I want to be able to post messages to a room
I can't post two messages within 24 hours
Each message must be between 2 and 2048 characters

Rules:

Message is longer than 2 characters
Message is shorter than 2048 characters
Message is posted by a user
Message is posted on a room
A message cannot be posted if the same user posted within the last 24 hours
Scenario: Sending a message with non-empty content
Given there is a user "HarryPotter"
And there is a room "Gryffindor Common Room"
And the last message sent on the room by "HarryPotter" was more than 24 hours ago
When they send a message with content "Hello" on the room "Gryffindor Common Room"
Then the message content should be "Hello"
And the sender should be "HarryPotter"
And the time should be in the format "yyyy/mm/dd hh:mm:ss"
And the message should be posted on the room "Gryffindor Common Room"

Scenario: Sending a message with empty content
Given there is a user "HarryPotter"
And there is a room "Gryffindor Common Room"
When they try to send a message with content "" on the room "Gryffindor Common Room"
Then they should see an error message "Content cannot be empty"

Scenario: Updating the content of a message
Given there is a user "HarryPotter"
And there is a room "Gryffindor Common Room"
And they have sent a message with content "Hello" on the room "Gryffindor Common Room"
When they update the message content to "Hi" on the room "Gryffindor Common Room"
Then the message content should be "Hi"

Scenario: Updating the content of a message to empty
Given there is a user "HarryPotter"
And there is a room "Gryffindor Common Room"
And they have sent a message with content "Hello" on the room "Gryffindor Common Room"
When they try to update the message content to "" on the room "Gryffindor Common Room"
Then they should see an error message "Content cannot be empty"

Scenario: Sending two messages within 24 hours
Given there is a user "HarryPotter"
And there is a room "Gryffindor Common Room"
And the last message sent on the room by "HarryPotter" was less than 24 hours ago
When they try to send a message with content "Hi" on the room "Gryffindor Common Room"
Then they should see an error message "You cannot post two messages within 24 hours"

Scenario: Sending a message with content shorter than 2 characters
Given there is a user "HarryPotter"
And there is a room "Gryffindor Common Room"
When they try to send a message with content "a" on the room "Gryffindor Common Room"
Then they should see an error message "Message must be at least 2 characters long"

Scenario: Sending a message with content longer than 2048 characters
Given there is a user "HarryPotter"
And there is a room "Gryffindor Common Room"
When they try to send a message with content that is longer than 2048 characters on the room "Gryffindor Common Room"
Then they should see an error message "Message cannot be longer than 2048 characters"