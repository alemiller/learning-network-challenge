# Learning Network Challenge

## The Problem
An ant is walking on the squares of a 5x5 grid. The grid should be numbered 1-5 along the x-axis and 1-5 along the y-axis starting in the upper left corner. The ant starts in the center square (3,3). Each second, the ant will choose (with equal probability) to do one of the following:  

-   Move north one square
-   Move south one square
-   Move east one square
-   Move west one square
-   Do not move
  
If it cannot perform the action it has decided on (move west while on the west edge, for example), it does not move.  
  
After one second, it has a 20% chance of being in the center, and a 20% chance of being in each adjacent square. (and a 0% chance of being in any other square on the board).  
  
What is the probability that the ant is on the center square after 15 seconds ?  
What is the probability that the ant is on one of the outermost squares after 1 hour?  
  
**Extra Credit:** Apply your code to a beetle that moves 2 squares at a time.

## An idea to solve it
Let P[t, (x,y)] be the probability that the ant will be at (x,y) at time t. We can form a recurrence relation as such:

> P[t, (x,y)] = 0.2 * [(5-No of neighbours of (x,y)) * P[t-1, (x,y)]] + 0.2 * P[t-1, (a,b)]  
> where (a,b) is a valid point neighbouring (x,y)

Start with P[0, (3,3)]=1, P[0, (a,b)]=0 for all other points and build the recursion.

## How to Install and Run the Project
 1. Clone the project into a local folder
 2. Enter to the new folder crated in the previous step
 3. Type:  `./answers.sh`
 4. A menue will show up
 5. Choose your option and press `Enter`

## Built with
PHP 7.0.33

## Author

 - [Alejandro Miller](https://www.linkedin.com/in/alejandro-miller)

