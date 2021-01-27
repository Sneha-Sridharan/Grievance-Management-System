require 'watir'
b = Watir::Browser.new
b.goto('http://localhost/DBMS-project/StudentLogin.php')
t = b.text_field name: 'username'
t.exists?
t.set 'mdskds'
sleep(3)
t1 = b.text_field name: 'password'
t1.exists?
t1.set 'hdkshds06'
sleep(3)
b.input(:name => 'submit').click
sleep(2)
t.set '18z585'
sleep(3)
t1.set 'hdkshds06'
sleep(3)
b.input(:name => 'submit').click
sleep(2)
b.link(:link => 'Add complaints').click
sleep(3)
t2 = b.select_list id: 'category'
t2.exists?
t2.select 'Classroom'
sleep(3)
t3 = b.textarea name: 'info'
t3.exists?
t3.set 'Time between CA exams was reduced to a week making it very difficult for us to learn
anything.'
sleep(3)
b.input(:name => 'submit').click
sleep(3)
b.alert.ok
b.link(:link => 'Delete complaints').click
sleep(3)
b.table(:id => "deletable")[5][5].click
sleep(3)
b.alert.ok
sleep(3)
b.alert.ok
sleep(3)
b.link(:link => 'Reset Password').click
sleep(3)
t4 = b.text_field name: 'old_pwd'
t4.exists?
sleep(3)
t4.set 'hdkshds'
t5 = b.text_field name: 'new_pwd'
t5.exists?
sleep(3)
t5.set 'hdkshds07'
t6 = b.text_field name: 'confirm_pwd'
t6.exists?
sleep(3)
t6.set 'hdkshds07'
sleep(3)
b.input(:name => 'submit').click
sleep(3)
b.alert.ok
sleep(3)
t4.set 'hdkshds06'
sleep(3)
t5.set 'hdkshds07'
sleep(3)
t6.set 'hdkshds'
sleep(3)
b.input(:name => 'submit').click
sleep(3)
b.alert.ok
sleep(3)
t4.set 'hdkshds06'
sleep(3)
t5.set 'hdkshds07'
sleep(3)
t6.set 'hdkshds07'
sleep(3)
b.input(:name => 'submit').click
sleep(3)
b.link(:link => 'Log out').click
sleep(3)
b.close
