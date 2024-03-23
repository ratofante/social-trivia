# Social-Trivia

#### Brief:

Social Trivia is a game. A trivia game. But it's social. What does it mean for a trivia game to be social? Users can, and are incentivized to, contribute new questions to the trivia. Each time a user scores above a certain threshold, they receive a token that allows them to add a new question.

New contributions — I call them _candidates_ — to the trivia start with a score of 50 and are integrated into the game. Each time a user starts a trivia, one of these candidates is randomly selected and presented as a bonus question for the current trivia. After the user answers the candidate, they must give it a thumbs up or down, representing a +1 or -1 to the candidate's score.

When a candidate reaches a score of 100, it is added to the official Questions of Social Trivia. However, if it reaches a score of 0, it is deleted and forgotten.

## DB -Tables

#### _questions_

Each question has its answer and three more false alternatives. Belongs to a category.

#### _categories_

Each category has many questions. Useful in the future for creating a category specific trivia.

#### _trivias_

Each game is registered under a user_id and the final score. Only finished games are stored.

#### _trivia_questions_

Stores trivia games (trivia_id) with each question selected for that particular game.

#### _candidates_

Questions added by users with its user_id and score. Belongs to a category.
