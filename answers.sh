#!/bin/bash

# Function to display the menu and prompt the user for a choice
show_menu() {
    echo "What problem do you want to solve?"
 
    echo "ANT Case:"
    echo "1. What is the probability that the ant is on the center square after 15 seconds?"
    echo "2. What is the probability that the ant is on one of the outermost squares after 1 hour?"
    echo ""
    echo "BEETLE Case:"
    echo "3. What is the probability that the beetle is on the center square after 15 seconds?"
    echo "4. What is the probability that the beetle is on one of the outermost squares after 1 hour?"
    echo ""
    echo "5. I want all answers"
    echo "0. Exit"
}

# Function to read the user's choice
read_choice() {
    read -p "Enter your choice (0-5): " choice
}

# Function to run the selected PHP file
run_php_file() {
    case $1 in
        1)
            php index.php '1' 'ant'
            ;;
        2)
            php index.php '2' 'ant'
            ;;
        3)
            php index.php '3' 'beetle'
            ;;
        4)
            php index.php '4' 'beetle'
            ;;
        5)
            php index.php '5' 'all'
            ;;
        *)
            echo "Invalid choice. Exiting."
            ;;
    esac
}

# Main script logic
while true; do
    show_menu
    read_choice

    case $choice in
        0)
            echo "Exiting."
            break
            ;;
        1|2|3|4|5)
            run_php_file $choice
            break
            ;;
        *)
            echo "Invalid choice. Try again."
            ;;
    esac
done
