# ChipSet
## Install on developer computer
```
cd /projects
git clone git@github.com:firststepsro/chipset.git
cd chipset

./install.sh
Enter User: same as project name
Enter DB Password: password generated in Database setup step
```

## Install on alpha
```
sudo mkdir -p /var/www/html/chipset
sudo chown $USER:$USER /var/www/html/chipset
cd /var/www/html/chipset
git clone git@github.com:firststepsro/chipset.git .

Database setup:
- go to phpmyadmin->Users->Add user
- fill in required information
User name: chipset
Host: localhost
Password: Generate new password
Check the "Create database with same name and grant all privileges" checkbox

./install.sh
Enter User: chipset
Enter DB Password: password generated in Database setup step
```

dev access to wp-admin:
root
1111

Admin -> Tools -> Migrate DB:
Find & Replace -> alpha 2 dev
