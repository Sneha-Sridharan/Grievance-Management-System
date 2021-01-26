require 'watir'
b = Watir::Browser.new
b.goto('http://localhost/DBMS-project/StudentLogin.php')
t = b.text_field name: 'username'
t.exists?
t.set 'dchdk'
t1 = b.text_field name: 'password'
t1.exists?
t1.set 'ashjsa06'
sleep(2)
b.input(:name => 'submit').click
sleep(2)
t.set '18z585'
t1.set 'ashjsa06'
sleep(2)
b.input(:name => 'submit').click
sleep(2)
b.link(:link => 'Add complaints').click
t2 = b.select_list id: 'category'
t2.exists?
t2.select 'Classroom'
t3 = b.textarea name: 'info'
t3.exists?
t3.set 'Time between CA exams was reduced to a week making it very difficult for us to learn anything.'
sleep(5)
b.input(:name => 'submit').click
sleep(2)
b.link(:link => 'Delete complaints').click
sleep(2)
b.table(:id => "deletetable")[4][5].click
sleep(2)
b.alert.ok
sleep(2)
b.link(:link => 'Reset Password').click
sleep(2)
t4 = b.text_field name: 'old_pwd'
t4.exists?
t4.set 'ashjsa'
t5 = b.text_field name: 'new_pwd'
t5.exists?
t5.set 'ashjsa07'
t6 = b.text_field name: 'confirm_pwd'
t6.exists?
t6.set 'ashjsa07'
sleep(2)
b.input(:name => 'submit').click
sleep(2)
t4.set 'ashjsa06'
t5.set 'ashjsa07'
t6.set 'ashjsa'
sleep(2)
b.input(:name => 'submit').click
sleep(2)
t4.set 'ashjsa06'
t5.set 'ashjsa07'
t6.set 'ashjsa07'
sleep(2)
b.input(:name => 'submit').click
sleep(2)
b.link(:link => 'Log out').click
sleep(10)
b.close