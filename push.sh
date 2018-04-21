#!/bin/bash
rev=$(git rev-parse --short HEAD)
git config --global user.email "travis@travis-ci.org"	
git config --global user.name "Travis CI"	
git clone -b master https://dennisotugo:${AUTOBUILD_TOKEN}@github.com/HNGInternship/HNGFun master	
git clone -b prod https://dennisotugo:${AUTOBUILD_TOKEN}@github.com/HNGInternship/HNGFun prod	
yes | cp -rf master/profiles/* prod/profiles/
yes | cp -rf master/answer* prod/
cd prod
git add .	
git commit -m "committed at ${rev} [ci skip]"
git push origin prod
echo -e" Done  "
