#!/bin/bash
git add . --all
echo "Commit:"
read commit
git commit -m "$commit"
git remote add origin https://mtrnord:b5b2678ba4947697251a3e9c5235442283adb440@github.com/RpicmsTeam/RPICMS.git
git push -f -u origin develop
git remote remove origin
echo "Fertig!"
sleep 10
