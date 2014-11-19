#!/bin/bash
git add . --all
echo "Commit:"
read commit
git commit -m '$commit'
git remote add origin https://github.com/RpicmsTeam/RPICMS.git
#git push -f -u origin develop
git remote remove origin
echo "Fertig!"
sleep 10
