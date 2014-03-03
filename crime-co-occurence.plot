res
set yrange [-1:*]
set xrange [0.1:1000]
unset key
set log x
set xtics 10
set ylabel crime font ",22"
set xlabel "Minor Crimes Summed" font ",22"

pl filename  u (binfl($1,150)):2 smo uni w lp  pt 7 ps 2 lt -1 lc 1 lw 6
pau 0.5

set term post eps color noclip
repl


