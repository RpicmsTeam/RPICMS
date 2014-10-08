#!/bin/bash
git add .
git commit -m "auto commit"
git remote add origin git@github.com:MTRNord/RPICMS.git
git push -f -u origin develop
sleep 30
