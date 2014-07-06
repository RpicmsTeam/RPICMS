#!/bin/bash
git pull git@github.com:MTRNord/RPICMS.git
git add .
git commit -m "auto commit"
git remote add origin git@github.com:MTRNord/RPICMS.git
git push -u origin master
