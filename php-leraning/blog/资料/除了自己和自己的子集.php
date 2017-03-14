
cid      cname      pid
 1       新闻         0
 2     小新闻         1
 3     小小新闻        2
 4      娱乐          0

1.获得当前分类的所有的子集的cid

2.排除掉
SELECT * FROM category WHERE cid NOT IN(1,2,3); 



找cid为20的子集
Array
(
    [0] => Array
        (
            [cid] => 21
            [cname] => 小新闻
            [ctitle] => 小新闻
            [cdes] => 
            [pid] => 20
            [csort] => 100
            [ckeywords] => 
        )

    [1] => Array
        (
            [cid] => 22
            [cname] => 小小新闻
            [ctitle] => 小小新闻
            [cdes] => 
            [pid] => 21
            [csort] => 100
            [ckeywords] => 
        )

    [2] => Array
        (
            [cid] => 20
            [cname] => 新闻
            [ctitle] => 新闻
            [cdes] => 新闻
            [pid] => 0
            [csort] => 100
            [ckeywords] => 新闻
        )

    [3] => Array
        (
            [cid] => 23
            [cname] => 娱乐
            [ctitle] => 娱乐
            [cdes] => 
            [pid] => 0
            [csort] => 100
            [ckeywords] => 
        )

)
