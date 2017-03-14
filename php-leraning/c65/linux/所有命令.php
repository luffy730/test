 1  ls
    2  ls -l
    3  ls -l /etc
    4  ls
    5  ls -l /etc
    6  cd /etc/
    7  ping baidu.com
    8  watch
    9  watch ls
   10  ls
   11  watch ls
   12  shutdown -h now
   13  date
   14  shutdown -h 11:52
   15  shutdown -r +1 "system will reboot in 1 minute"
   16  halt
   17  passwd 
   18  ls
   19  ls -a
   20  ls -l
   21  ls -al
   22  ls -h
   23  ls -hl
   24  ls -alh
   25  ls -l
   26  ls -lah
   27  cd /etc
   28  cd ~lisi
   29  cd /tmp/
   30  cd ..
   31  cd /etc/sysconfig/
   32  pwd
   33  cd /tmp
   34  pwd
   35  mkdir a
   36  ls
   37  ls -l
   38  mkdir b
   39  ls
   40  ls -l
   41  mkdir /a
   42  cd /
   43  ls
   44  cd /tmp/
   45  ls
   46  mkidr c/d
   47  mkdir c/d
   48  mkdir -p c/d
   49  ls
   50  rm a
   51  rm yum.log 
   52  ls
   53  rm a
   54  rm -r a
   55  ls
   56  rm -r c
   57  ls
   58  rm -r b
   59  ls
   60  touch 1.html
   61  mkdir a
   62  ls
   63  rm -r 1.html 
   64  rm -r a
   65  mkdir a/b/c/d/e/f
   66  mkdir -p a/b/c/d/e/f
   67  rm -r a
   68  y
   69  mkdir -p a/b/c/d
   70  ls
   71  rm -rf a
   72  halt
   73  cd /tmp
   74  ls
   75  cd /etc/
   76  cd ..
   77  cd /tmp/
   78  ls
   79  touch index.hp
   80  ls
   81  mkdir abc
   82  ls
   83  cp index.hp abc/
   84  ls
   85  cd abc/
   86  ls
   87  cd ..
   88  ls
   89  cp index.hp abc/index.php
   90  cd abc/
   91  ls
   92  cd ..
   93  ls
   94  rm -rf *
   95  ls
   96  touch 1.php
   97  touch 1.html
   98  touch 2.php
   99  touch 1.gif
  100  ls
  101  mkdir abc
  102  ls
  103  cp *.php abc/
  104  ls
  105  cd abc/
  106  ls
  107  cd ..
  108  ls
  109  rm -rf abc
  110  ls
  111  mkdir abc
  112  ls
  113  mv *.php abc/
  114  ls
  115  cd abc
  116  ls
  117  cd ..
  118  ls
  119  mv 1.gif 2.gif
  120  ls
  121  head -n 2 /etc/passwd
  122  cp /etc/passwd
  123  cp /etc/passwd .
  124  ls
  125  vi passwd 
  126  head -n 2 passwd 
  127  tail -n 2 passwd 
  128  cat passwd 
  129  cat -n passwd 
  130  whereis passwd
  131  find / -name passwd
  132  ls
  133  cd abc
  134  ls
  135  touch 1.html
  136  ls
  137  cd ..
  138  find / -name 1.html
  139  find /tmp -name 1.html -exec rm -i {} \;
  140  ls
  141  gzip passwd 
  142  ls
  143  gzip -d passwd.gz 
  144  ls
  145  ls -l
  146  gzip passwd 
  147  ls -l
  148  gzip -d passwd.gz 
  149  ls
  150  ls -l
  151  bzip2 passwd 
  152  ls -l
  153  rm -rf *
  154  ls
  155  cd /etc/
  156  ls
  157  cp *.conf /tmp/
  158  cd /tmp/
  159  ls
  160  mkdir backup
  161  s
  162  ls
  163  mv *.conf backup/
  164  ls
  165  cd backup/
  166  ls
  167  cd .
  168  ls -l
  169  cd ..
  170  ls
  171  ls -l
  172  ls -lh
  173  tar -zcvf backup.tar.gz backup/
  174  ls
  175  ls -lh
  176  cd backup
  177  ls -lh
  178  ls -ld back
  179  cd ..
  180  ls -lhd backup
  181  cd backup
  182  ls -lh
  183  cd ..
  184  ls -lh
  185  rm -rf backup.tar.gz 
  186  ls
  187  tar -zcvf b.tar.gz backup/
  188  tar -zcvf etc.tar.gz /etc
  189  ls
  190  ls -lh
  191  cd /etc/
  192  ls -lh
  193  ls -h
  194  du -h .
  195  cd /tmp/
  196  ls
  197  ls -l
  198  ls -lh
  199  ls
  200  tar -zxvf etc.tar.gz 
  201  ls
  202  ls -lh
  203  cd /etc/
  204  du -h
  205  du -h /etc
  206  cd ..
  207  ls
  208  cd tmp/
  209  ls
  210  touch 1.html
  211  ls 
  212  vi 1.html 
  213  cd /tmp/
  214  touch 1.html
  215  vi 1.html
  216  cat -n 1.html 
  217  ls
  218  vi 1.html 
  219  cat 1.html 
  220  vi 1.html 
  221  ls
  222  vi 1.html
  223  cd /tmp/
  224  ls
  225  vi 1.html 
  226  ls
  227  rm -rf 1.html
  228  cp /etc/passwd .
  229  ls
  230  vi passwd 
  231  ls
  232  halt
  233  cd /tmp/
  234  ls
  235  touch a.html
  236  exit
  237  useradd lisi
  238  passwd lisi
  239  su lisi
  240  useradd -G lisi wangwu
  241  id wangwu
  242  passwd -S wangwu
  243  passwd wangwu
  244  cd /home/
  245  ls
  246  cd ~
  247  pwd
  248  cd /home/
  249  ls
  250  userdel lisi
  251  passwd -S lisi
  252  ls
  253  rm -rf lisi
  254  ls
  255  userdel -r wangwu
  256  id wangwu
  257  ls
  258  groupadd shop
  259  useradd -G shop lisi
  260  groupdel lisi
  261  useradd -G shop lisi
  262  id lisi
  263  groupadd category
  264  usermod -G category lisi
  265  id lisi
  266  usermod -G shop lisi
  267  id lisi
  268  usermod -G shop category lisi
  269  usermod -G shop,category lisi
  270  id lisi
  271  id wangwu
  272  id root
  273  exit
  274  chown lisi lisi.html 
  275  ls -l
  276  chown wangwu lisi.html 
  277  id lisi
  278  ls -l
  279  chown wangwu:wangwu lisi.html 
  280  ls -l
  281  chown :lisi lisi.html 
  282  ls -l
  283  chmod -R 754 lisi.html 
  284  ls -l
  285  ls
  286  touch 1.sh
  287  vi 1.sh
  288  1.sh
  289  ./1.sh
  290  ls -l
  291  chmod -R 744 1.sh 
  292  ls -l
  293  ./1.sh 
  294  touch test.html
  295  ls -l
  296  mkdir test
  297  ls -l
  298  chmod -R 644 test
  299  ls -l
  300  cd test
  301  cd ..
  302  cd test
  303  ls
  304  cd ..
  305  history
  306  cd /tmp
  307  ls
  308  ls -l
  309  chmod -R 0777 2.html 
  310  ls -l
  311  id lisi
  312  passwd -S lisi
  313  passwd lisi
  314  useradd wangwu
  315  id wangwu
  316  passwd wangwu
  317  id wangwu
  318  passwd -S wangwu
  319  cd /home/
  320  ls
  321  su lisi
  322  cd /tmp/
  323  rm -rf *
  324  su lisi
  325  id wangwu
  326  id lisi
  327  ls -l
  328  su wangwu
  329  usermod -G lisi wangwu
  330  id wangwu
  331  su wangwu
  332  cd lisi
  333  ls
  334  touch 11.html
  335  ls -l
  336  ls
  337  ls -l
  338  su lisi
  339  vi /etc/sysconfig/network-scripts/ifcfg-eth0 
  340  service network restart
  341  ping baidu.com
  342  vi /etc/sysconfig/network-scripts/ifcfg-eth0 
  343  service network restart
  344  ping baidu.com
  345  vi /etc/sysconfig/network-scripts/ifcfg-eth0 
  346  iptables -F
  347  service iptables save
  348  vi /etc/selinux/config 
  349  ifconfig
  350  cd /tmp/
  351  ls
  352  history
  353  halt
  354  cd /etc/
  355  du -ah
  356  du -ah /etc
  357  du -sh /etc
  358  df -h
  359  fdisk -l
  360  halt
  361  fdisk -l
  362  fdisk /dev/sdb
  363  fdisk -l
  364  mkfs -t ext4 /dev/sdb1
  365  mkfs -t ext4 /dev/sdb2
  366  mount
  367  mkdir /www
  368  mount /dev/sdb1 /www
  369  mount
  370  cd /www/
  371  ls
  372  touch 1.html
  373  cd ..
  374  umount /dev/sdb1
  375  cd /www/
  376  ls
  377  mount /dev/sdb1 /www
  378  ls
  379  cd ..
  380  cd /www/
  381  ls
  382  reboot
  383  cd /www/
  384  ls
  385  mount
  386  vi /etc/fstab 
  387  reboot
  388  cd /www/
  389  ls
  390  fdisk -l
  391  umount /dev/sdb1
  392  cd ..
  393  umount /dev/sdb1
  394  fdisk /dev/sdb
  395  mkfs -t ext4 /dev/sdb1
  396  mkfs -t ext4 /dev/sdb5
  397  mkfs -t ext4 /dev/sdb6
  398  mount /dev/sdb1 /www
  399  cd /www/
  400  ls
  401  ping baidu.com
  402  yum install -y httpd mysql mysql-server php php-mysql php-gd php-mbstring
  403  ls
  404  apachectl start
  405  apachectl stop
  406  apachectl restart
  407  apachectl start
  408  apachectl restart
  409  service httpd restart
  410  ifconfig
  411  cd /var/www/html/
  412  vi index.php
  413  cd .
  414  cd ..
  415  ls -l
  416  chown -R apache:apache html/
  417  cd html/
  418  cd cache-demo/
  419  ls -l
  420  service mysqld restart
  421  mysql -uroot -p
  422  cd /etc/httpd/
  423  ls
  424  cd conf
  425  ls
  426  cp httpd.conf httpd.conf.bak
  427  ls
  428  vi httpd.conf
  429  ls
  430  rm -rf httpd.conf
  431  cp httpd.conf.bak httpd.conf
  432  ls
  433  vi httpd.conf
  434  service httpd restart
  435  vi httpd.conf
  436  service httpd restart
  437  cd /www/
  438  ls
  439  cd /var/www/html/
  440  cd /etc/httpd/conf
  441  vi httpd.conf
  442  service httpd restart
  443  cd /www/
  444  ls
  445  vi index.php
  446  history
  447  history | more
  448  history | echo >> index.html
  449  cd /www/
  450  ls
  451  fdisk -l
  452  umount /dev/sdb1
  453  cd ..
  454  umount /dev/sdb1
  455  fdisk /dev/sdb
  456  mkfs -t ext4 /dev/sdb1
  457  mkfs -t ext4 /dev/sdb5
  458  mkfs -t ext4 /dev/sdb6
  459  mount /dev/sdb1 /www
  460  cd /www/
  461  ls
  462  ping baidu.com
  463  yum install -y httpd mysql mysql-server php php-mysql php-gd php-mbstring
  464  ls
  465  apachectl start
  466  apachectl stop
  467  apachectl restart
  468  apachectl start
  469  apachectl restart
  470  service httpd restart
  471  ifconfig
  472  cd /var/www/html/
  473  vi index.php
  474  cd .
  475  cd ..
  476  ls -l
  477  chown -R apache:apache html/
  478  cd html/
  479  cd cache-demo/
  480  ls -l
  481  service mysqld restart
  482  mysql -uroot -p
  483  cd /etc/httpd/
  484  ls
  485  cd conf
  486  ls
  487  cp httpd.conf httpd.conf.bak
  488  ls
  489  vi httpd.conf
  490  ls
  491  rm -rf httpd.conf
  492  cp httpd.conf.bak httpd.conf
  493  ls
  494  vi httpd.conf
  495  service httpd restart
  496  vi httpd.conf
  497  service httpd restart
  498  cd /www/
  499  ls
  500  cd /var/www/html/
  501  cd /etc/httpd/conf
  502  vi httpd.conf
  503  service httpd restart
  504  cd /www/
  505  ls
  506  vi index.php
  507  history
  508  history | more
  509  history | echo >> index.html
  510  vi index.html
  511  history | echo '123'>> index.html
  512  history
  580  vi /etc/httpd/conf/httpd.conf
  581  service httpd restart
  582  vi /etc/httpd/conf/httpd.conf
  583  service httpd restart
  584  vi /etc/httpd/conf/httpd.conf
  585  service httpd restart
  586  cd /www/
  587  ls
  588  vi i.php
  589  cd /etc/httpd/conf.d/
  590  ls
  591  cp php.conf php.conf.bak
  592  vi php.conf
  593  service httpd restart
  594  cd /etc/httpd/conf
  595  ls
  596  vi httpd.conf
  597  service httpd restart
  598  cd ../conf.d/
  599  ls
  600  vi v.conf
  601  vi /etc/httpd/conf/httpd.conf
  602  vi v.conf
  603  cd /www/
  604  ls
  605  mkdir hd
  606  mkdir qq
  607  ls -l
  608  ls
  609  rm -rf i.php 
  610  rm -rf index.*
  611  ls -l
  612  ls
  613  cd hd/
  614  vi index.html
  615  pwd
  616  cd ../qq
  617  vi index.html
  618  service httpd restart
  619  date
  620  yum install -y ntp
  621  service ntpd restart
  622  date
  623  service ntpd status
  624  service httpd status
  625  reboot
  626  service ntpd status
  627  date
  628  service ntpd restart
  629  chkconfig --level 35 on
  630  chkconfig --level 35 ntpd on
  631  reboot
  632  service ntpd status
  633  chkconfig --level 35 httpd on
  634  chkconfig --level 35 mysqld on
  635  cd /etc/init.d/
  636  ls
  637  ls -l
  638  init 3
  639  init 6
  640  chkconfig --level 35 ntpd off
  641  chkconfig --list ntpd
  642  chkconfig --level 35 ntpd on
  643  chkconfig --list ntpd
  644  history