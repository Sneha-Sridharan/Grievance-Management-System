require 'watir'
b = Watir::Browser.new
b.goto('http://localhost/DBMS-project/Adminlogin.php')
t = b.text_field name: 'username'
t.exists?
t.set '11L123'
sleep(3)
t1 = b.text_field name: 'password'
t1.exists?
t1.set 'w224urhjt'
sleep(3)
b.input(:name => 'submit').click
sleep(3)
b.table(:name => "table")[2].click
sleep(3)
10
t3 = b.select_list id: 'memberid'
t3.exists?
t3.select '17F123 - J. Ravi'
t3.selected_options
sleep(3)
t4 = b.text_field name: 'mytext[]'
t4.exists?
t4.set 'Complete the work as soon as possible'
sleep(3)
b.button(:name => 'add').click
sleep(3)
b.link(:link => 'Remove').click
sleep(3)
b.button(:name => 'submit').click
sleep(3)
b.alert.ok
sleep(3)
b.link(:link => 'View assigned complaints').click
t2 = b.table name: 'table'
t2.exists?
sleep(3)
b.table(:id => "table")[2].click
sleep(3)
t3 = b.text_field name: 'mytext[]'
t3.exists?
t3.set 'Arrange for 5 new buckets'
sleep(3)
b.button(:name => 'add').click
sleep(3)
t4 = b.text_field name: 'text[]'
t4.exists?
t4.set 'Produce bills to get reimbursement'
sleep(3)
b.button(:name => 'submit').click
sleep(2)
b.alert.ok
sleep(3)
b.link(:link => 'View completed complaints').click
sleep(3)
b.link(:link => 'Log out').click
sleep(3)
b.close
