require 'watir'
b = Watir::Browser.new
b.goto('http://localhost/DBMS-project/Memberlogin.php')
t = b.text_field name: 'username'
t.exists?
t.set '17F123'
sleep(3)
t1 = b.text_field name: 'password'
t1.exists?
t1.set 'jhd132fp'
sleep(3)
b.input(:name => 'submit').click
sleep(3)
t2 = b.table name: 'assigned'
t2.exists?
b.table(:name => 'assigned')[1].click
sleep(3)
t3 = b.select_list id: 'status'
t3.exists?
sleep(3)
t3.select 'Redressed'
sleep(3)
b.button(:name => 'submit').click
sleep(3)
b.alert.ok
sleep(3)
b.link(:link => 'Log out').click
sleep(3)
b.close
