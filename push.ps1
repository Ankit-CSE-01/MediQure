git config --global user.email "73ankitkrsingh@gmail.com"
git config --global user.name "Ankit"
git add .
git commit -m "MediQure updates: Dark Mode, Email fix, Rename"
git branch -M main
git remote remove origin 2>$null
git remote add origin https://github.com/Ankit-CSE-01/MediQure.git
git push -u origin main
