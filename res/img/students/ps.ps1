for($i=1; $i -le 10; $i++){
wget "https://robohash.org/ - $i" -OutFile $i.jpg -usebasicparsing
}
