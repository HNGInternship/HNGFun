#!/bin/bash
rev=$(git rev-parse --short HEAD)
git config --global user.email "travis@travis-ci.org"
git config --global user.name "Travis CI"
git clone --quiet --branch master = https://${AUTOBUILD_TOKEN}@github.com/HNGInternship/HNGFun
git add ./profiles/*
git add . answers*
git commit -m "committed at ${rev}" 
git push origin prod
echo -e" Done \n "
