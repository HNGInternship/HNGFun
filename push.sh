#!/bin/bash
rev=$(git rev-parse --short HEAD)
git config --global user.email "travis@travis-ci.org"
git config --global user.name "Travis CI"
<<<<<<< HEAD
git clone --quiet --branch master = https://dennisotugo:$GITHUB_API_KEY@github.com/HNGInternship/HNGFun
git add ./profiles/*
git add . answers*
git commit -m "committed at ${rev} [ci skip]" 
=======
git clone --quiet --branch master = https://${AUTOBUILD_TOKEN}@github.com/HNGInternship/HNGFun
git checkout -b prod
git add ./profiles/*
git add . answers*
git commit -m "committed at ${rev}" 
>>>>>>> 6b1673e11bdc5492c3c7149c2b227e0b0352e070
git push origin prod
echo -e" Done \n "
