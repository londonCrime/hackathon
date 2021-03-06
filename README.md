Data description
===============
The project is based on Westminster crime data, located here 
  - 'data/crime_timestamp_lsoa_type.csv'

It can be easily extended to the entire metropolitan police crime data, located here 
  - 'data/reduced_dataset_greater_london.csv'

Code aim
===============
The code aim is to monitor the occurrence of dangerous crime by 
analysing (and visualising) the amount of petty crimes.

Crime type are defined in police data and we consider separately petty crime (Anti-social-behaviour, Other-theft, Vehicle-crime, Shoplifting, Public-order, Bicycle-theft, Other-crime) and big/dangerous crime (Drugs, Burglary, Robbery, etc...)

Given a certain amount of petty crime in a given area first we count the co-occurence of dangerous crime.
This define a set of characteristic curves that relates total amount of petty crime with amount of dangerous crime

Running the code
===============
If you can't wait and you want to stop crime right now simply open a terminal, run 
```bash master_script.sh```


and see the magic happen.
Only php is needed.

Output data
===============
Output data is saved in the 'over_treshold/' folder.
The .csv files contains the LSOA area-code in the first column and the strings green/yellow/red in the second.
'Red' means that in the corresponding LSOA patch there is an amount of small crime that is over the threshold above which you expect a lot of dangerous crimes.
Petty crime threshold for each crime have been selected manually from the files in 'results_one_to_few/' folder
Hence 'Reds' are the risky areas where you would expect to find big criminality.

You can then use the .cvs files in the folder 'over_treshold/' to do your own visualisation or just open map.html.
You can see the demo running with Crosslet [here]:

Technical stuffs:
The pre-analysis code uses php scripts for the data manipulation, gnuplot (optional) for same visualisation testing and a bash script.
The output .csv files created in 'over_treshold/' folder are then used in the python visualisation code.

TODOs:
one should normalise for cell size and the time for the observation so that all cells, and all observations are compatible between them.

[here]:http://tekja.com/dev/urbanDataHack/map.html
