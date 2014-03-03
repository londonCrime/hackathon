#-----------------------------------#
#         INPUT FILE DATASET        #
#-----------------------------------#
#Copyright 2014 Moreno Bonaventura (morenobonaventura@gmail.com)
#
#Licensed under the Apache License, Version 2.0 (the "License");
#you may not use this file except in compliance with the License.
#You may obtain a copy of the License at
#
#    http://www.apache.org/licenses/LICENSE-2.0

#Unless required by applicable law or agreed to in writing, software
#distributed under the License is distributed on an "AS IS" BASIS,
#WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
#See the License for the specific language governing permissions and
#limitations under the License.
#



#- Westminster dataset
input_file="data/crime_timestamp_lsoa_type.csv"

#- Great London metropolitan police dataset
input_file="data/reduced_dataset_greater_london.csv"


tar -xvf data.tar.gz


#----------------------------------------------------------------------------------------------------------#
#    Compute co-occurence between Small and Big Crimes, plot generated in folder 'results_one_to_few/'     #
#----------------------------------------------------------------------------------------------------------#

mkdir results_one_to_few
for crime in `cat crime-list`
 do
 echo $crime
 php crime-co-occurence_one_to_fews.php $input_file $crime > temp_out
 #gnuplot -e "crime='$crime'; filename ='temp_out'" crime-co-occurence.plot > results_one_to_few/$crime.eps
done






#--------------------------------------------------------------------------------------------#
#    Search for locations where the number of big crimes is suspiciously low compared        #
#    to the number of big crimedata generated in folder 'over_threshold/'     		     #
#--------------------------------------------------------------------------------------------#

echo "finding threshold"
mkdir over_threshold
for crime in `cat crime-list`
 do
 echo $crime
 php crime-over-threshold.php $input_file $crime > "over_threshold/"$crime"_over_threshold.csv"
done

rm temp_out


