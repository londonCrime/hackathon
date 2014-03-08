import os
import pandas as pd


def to_int(infile='/over_threshold/Anti-social-behaviour_over_threshold.csv',
           outfile='/data/anti_social_behaviour.tsv'):
    """
    Convert the data to tsv, with 0,1,2 instead of 'green', 'yellow', 'red'
    """

    # Load crime data
    df = pd.read_csv(os.getcwd() + infile, header=None)
    df.columns = ['LSOA', 'value']

    # Conditionally replace values in dataframe
    df['value'][df['value'] == 'green'] = 0
    df['value'][df['value'] == 'yellow'] = 1
    df['value'][df['value'] == 'red'] = 2

    # Remove extra chars
    df['LSOA'] = df['LSOA'].map(lambda x: x[:-1])

    # Make a tsv file
    df.to_csv(os.getcwd() + outfile, sep='\t', index=False)

    print '\nA tsv file with the crime data has been created here:'
    print os.getcwd() + outfile


def main():

    startTime = pd.datetime.now()

    to_int(infile='/over_threshold/Anti-social-behaviour_over_threshold.csv',
           outfile='/data/anti_social_behaviour.tsv')

    to_int(infile='/over_threshold/Bicycle-theft_over_threshold.csv',
           outfile='/data/bicycle_theft.tsv')

    to_int(infile='/over_threshold/Burglary_over_threshold.csv',
           outfile='/data/burglary.tsv')

    to_int(infile='/over_threshold/Criminal-damage-arson_over_threshold.csv',
           outfile='/data/criminal_damage_arson.tsv')

    to_int(infile='/over_threshold/Drugs_over_threshold.csv',
           outfile='/data/drugs.tsv')

    to_int(infile='/over_threshold/Other-crime_over_threshold.csv',
           outfile='/data/other_crime.tsv')

    to_int(infile='/over_threshold/Other-theft_over_threshold.csv',
           outfile='/data/other_theft.tsv')

    to_int(infile='/over_threshold/Possession-of-weapons_over_threshold.csv',
           outfile='/data/possession_of_weapons.tsv')

    to_int(infile='/over_threshold/Public-order_over_threshold.csv',
           outfile='/data/public_order.tsv')

    to_int(infile='/over_threshold/Robbery_over_threshold.csv',
           outfile='/data/robbery.tsv')

    to_int(infile='/over_threshold/Shoplifting_over_threshold.csv',
           outfile='/data/shoplifting.tsv')

    to_int(infile='/over_threshold/Theft-from-the-person_over_threshold.csv',
           outfile='/data/theft_from_the_person.tsv')

    to_int(infile='/over_threshold/Vehicle-crime_over_threshold.csv',
           outfile='/data/vehicle_crime.tsv')

    to_int(infile='/over_threshold/Violent-crime_over_threshold.csv',
           outfile='/data/violent_crime.tsv')

    print '\nCompleted in ' + str(pd.datetime.now() - startTime)


if __name__ == '__main__':
    main()
