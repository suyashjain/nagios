This is one of my favorite script written by me to fetch the data from nagios config files in to array , and i was glad to see the results. It took a lot of hours but finally i did it. This script is very useful when you want to do any analysis or any import thing on nagios.
 
Sorry for my dirty coding skills , i do coding for my needs only , i am not a fully functional programmer.
 
These are the steps took to achieve it.

1. It takes nagios.cfg file as input with full path.

2. nagios.cfg is passed to main function config_file_list() which retrieves the cfg_dir and cfg_file parameters.

3.Then config_file_list() retrieves the “.cfg” files from the cfg_dir path and cfg_file and returns as simple array.

4.One foreach loop is started over the array returned by config_file_list()

5.And then each file is parsed , line by line and configuration is retrieved from the files and moved to array.
