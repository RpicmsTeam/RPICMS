#!/bin/bash
git add . --all
git commit -m "auto commit"
git remote add origin https://github.com/RpicmsTeam/RPICMS.git
git push -f -u origin develop
git remote remove origin
sleep 10
