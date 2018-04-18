#!/bin/bash
rev=$(git rev-parse --short HEAD)
git config --global --global user.password "password"
git config --global user.email "useremail@domain.com" 
git config --global user.name "Your Name" 
git add .
git commit -m "committed at ${rev}" 
git push origin HEAD:master
echo -e" Done \ n "
