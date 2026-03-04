#!/bin/bash

# Default commit message if none provided
MESSAGE=${1:-"Update: $(date +'%Y-%m-%d %H:%M:%S')"}

echo "Step 1: Adding all changes..."
git add .

echo "Step 2: Committing with message: '$MESSAGE'..."
git commit -m "$MESSAGE"

echo "Step 3: Pushing to repository..."
git push

if [ $? -eq 0 ]; then
    echo "Successfully pushed to git!"
else
    echo "Push failed!"
    exit 1
fi
