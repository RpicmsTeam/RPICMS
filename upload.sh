#!/bin/bash
git add . --all
git commit -m "auto commit"
git remote add origin git@github.com:RpicmsTeam/RPICMS.git
git push -f -u origin develop
sleep 30
