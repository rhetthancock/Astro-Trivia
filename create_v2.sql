CREATE TABLE users (
    user_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(256) NOT NULL,
    name VARCHAR(64) NOT NULL,
    username VARCHAR(32) NOT NULL,
    password VARCHAR(60) NOT NULL,
    created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE questions (
    question VARCHAR(512) NOT NULL,
    answer VARCHAR(32)
);

CREATE TABLE scores (
    user_id INT,
    score INT,
    time TIMESTAMP
);

CREATE TABLE bodies (
    name VARCHAR(64) NOT NULL PRIMARY KEY,
    apoapsis FLOAT,
    axialTilt FLOAT,
    class VARCHAR(64),
    density FLOAT,
    discoveredBy VARCHAR(64),
    discoveredYear INT,
    eccentricity FLOAT,
    gravity FLOAT,
    index INT,
    inclination FLOAT,
    mass DOUBLE,
    namedFor VARCHAR(128),
    orbitalPeriod VARCHAR(32),
    orbitalSpeed FLOAT,
    periapsis FLOAT,
    radius FLOAT,
    rotationalPeriod VARCHAR(32),
    satelliteOf VARCHAR(64),
    surfaceArea DOUBLE,
    tempMax INT,
    tempMin INT,
    type VARCHAR(32),
    volume DOUBLE,
);

CREATE TABLE missions (
    name VARCHAR(64) PRIMARY KEY,
    acronym VARCHAR(32),
    launched DATE,
    destination VARCHAR(32)
);

INSERT INTO bodies
VALUES (
    "mercury", /* name */
    69816900, /* apoapsis (km) */
    2.04, /* axialTilt (deg) */
    "planet", /* class */
    5.427, /* density (g/cm) */
    null, /* discoveredBy */
    null, /* discoveredYear */
    0.205630, /* eccentricity */
    3.7, /* gravity (m/s^2) */
    1, /* index */
    7.005, /* inclination (deg) */
    3.3011E+23, /* mass (kg) */
    "Roman messenger god", /* namedFor */
    "87.969d" /* orbitalPeriod */
    47.362, /* orbitalSpeed (km/s) */
    46001200, /* periapsis (km) */
    2439.7, /* radius (km) */
    "58d 15h 30m", /* rotationalPeriod */
    "the sun", /* satelliteOf */
    7.48E+7, /* surfaceArea (km^2) */
    700, /* tempMax (k) */
    80, /* tempMin (k) */
    "terrestrial", /* type */
    6.083E+10 /* volume (km^3) */
);

INSERT INTO bodies
VALUES (
    "venus", /* name */
    108939000, /* apoapsis (km) */
    177.36, /* axialTilt (deg) */
    "planet", /* class */
    5.243, /* density (g/cm) */
    null, /* discoveredBy */
    null, /* discoveredYear */
    0.006772, /* eccentricity */
    8.87, /* gravity (m/s^2) */
    2, /* index */
    3.39458, /* inclination (deg) */
    4.8675E+24, /* mass (kg) */
    "Roman god of love", /* namedFor */
    "224.701d" /* orbitalPeriod */
    35.02, /* orbitalSpeed (km/s) */
    107477000, /* periapsis (km) */
    6051.8, /* radius (km) */
    "116d 18h", /* rotationalPeriod */
    "the sun", /* satelliteOf */
    4.6023E+8, /* surfaceArea (km^2) */
    737, /* tempMax (k) */
    737, /* tempMin (k) */
    "terrestrial", /* type */
    9.2843E+11 /* volume (km^3) */
);

INSERT INTO planets
VALUES (
    "earth", /* name */
    152100000, /* aphelion (km) */
    23.4392811, /* axialTilt (deg) */
    "terrestrial", /* class */
    5.514, /* density (g/cm) */
    0, /* discovered (year) */
    "23h 56m 4.1s", /* dayLength */
    0.0167086, /* eccentricity */
    "English/German word for ground", /* god */
    9.807, /* gravity (m/s^2) */
    0.00005, /* inclination (deg) */
    3, /* indexFromSun */
    5.97237E+24, /* mass (kg) */
    29.78, /* orbitalSpeed (km/s) */
    147095000, /* perihelion (km) */
    6371.0, /* radius (km) */
    510072000, /* surfaceArea (km^2) */
    330, /* tempMax (k) */
    184, /* tempMin (k) */
    1.08321E+12, /* volume (km^3) */
    "365.256363004d" /* yearLength */
);

INSERT INTO planets
VALUES (
    "mars", /* name */
    249200000, /* aphelion (km) */
    25.19, /* axialTilt (deg) */
    "terrestrial", /* class */
    3.9335, /* density (g/cm) */
    0, /* discovered (year) */
    "1d 37m", /* dayLength */
    0.0934, /* eccentricity */
    "Roman god of war", /* god */
    3.72076, /* gravity (m/s^2) */
    1.850, /* inclination (deg) */
    4, /* indexFromSun */
    6.4171E+23, /* mass (kg) */
    24.007, /* orbitalSpeed (km/s) */
    206700000, /* perihelion (km) */
    3389.5, /* radius (km) */
    144798500, /* surfaceArea (km^2) */
    308, /* tempMax (k) */
    130, /* tempMin (k) */
    1.6318E+11, /* volume (km^3) */
    "686.98d" /* yearLength */
);

INSERT INTO planets
VALUES (
    "jupiter", /* name */
    816620000, /* aphelion (km) */
    3.13, /* axialTilt (deg) */
    "jovian", /* class */
    1.326, /* density (g/cm) */
    0, /* discovered (year) */
    "9h 56m", /* dayLength */
    0.0489, /* eccentricity */
    "Roman king of the gods", /* god */
    24.79, /* gravity (m/s^2) */
    1.303, /* inclination (deg) */
    5, /* indexFromSun */
    1.8982E+27, /* mass (kg) */
    13.07, /* orbitalSpeed (km/s) */
    740520000, /* perihelion (km) */
    69911, /* radius (km) */
    61419000000, /* surfaceArea (km^2) */
    165, /* tempMax (k) */
    112, /* tempMin (k) */
    1.4313E+15, /* volume (km^3) */
    "4332.59d" /* yearLength */    
);

INSERT INTO planets
VALUES (
    "saturn", /* name */
    1514500000, /* aphelion (km) */
    26.73, /* axialTilt (deg) */
    "jovian", /* class */
    0.687, /* density (g/cm) */
    0, /* discovered (year) */
    "10h 42m", /* dayLength */
    0.0565, /* eccentricity */
    "Roman god of agriculture", /* god */
    10.44, /* gravity (m/s^2) */
    2.485, /* inclination (deg) */
    6, /* indexFromSun */
    5.6834E+26, /* mass (kg) */
    9.68, /* orbitalSpeed (km/s) */
    1352550000, /* perihelion (km) */
    58232, /* radius (km) */
    4.27E+10, /* surfaceArea (km^2) */
    134, /* tempMax (k) */
    84, /* tempMin (k) */
    8.2713E+14, /* volume (km^3) */
    "29.457y" /* yearLength */    
);

INSERT INTO planets
VALUES (
    "uranus", /* name */
    3.00841E+9, /* aphelion (km) */
    97.77, /* axialTilt (deg) */
    "jovian", /* class */
    1.27, /* density (g/cm) */
    1781, /* discovered (year) */
    "17h 14m", /* dayLength */
    0.046381, /* eccentricity */
    "Greek god of the sky", /* god */
    8.69, /* gravity (m/s^2) */
    0.773, /* inclination (deg) */
    7, /* indexFromSun */
    8.6810E+25, /* mass (kg) */
    6.80, /* orbitalSpeed (km/s) */
    2.74213E+9, /* perihelion (km) */
    25362, /* radius (km) */
    8.1156E+9, /* surfaceArea (km^2) */
    76, /* tempMax (k) */
    53, /* tempMin (k) */
    6.833E+13, /* volume (km^3) */
    "30688.5d" /* yearLength */        
);

INSERT INTO planets
VALUES (
    "neptune", /* name */
    4.5373E+9, /* aphelion (km) */
    28.32, /* axialTilt (deg) */
    "jovian", /* class */
    1.638, /* density (g/cm) */
    1846, /* discovered (year) */
    "16h 6m", /* dayLength */
    0.009456, /* eccentricity */
    "Roman god of the sea", /* god */
    11.15, /* gravity (m/s^2) */
    1.767975, /* inclination (deg) */
    8, /* indexFromSun */
    1.02413E+26, /* mass (kg) */
    5.43, /* orbitalSpeed (km/s) */
    4.45951E+9, /* perihelion (km) */
    24622, /* radius (km) */
    7.6183E+9, /* surfaceArea (km^2) */
    72, /* tempMax (k) */
    55, /* tempMin (k) */
    6.254E+13, /* volume (km^3) */
    "60182d" /* yearLength */    
);

INSERT INTO moons
VALUES (
    "the moon", /* name */
    405400, /* apogee (km) */
    1.5424, /* axialTilt (deg) */
    3.344, /* density (g/cm) */
    null, /* discoveredBy (names) */
    0, /* discoveredWhen (year) */
    0.0549, /* eccentricity */
    "Germanic word for month", /* god */
    1.62, /* gravity (m/s^2) */
    5.145, /* inclination (deg) */
    "27d 7h 43m 11.5s", /* orbitalPeriod */
    1.022, /* orbitalSpeed (km/s) */
    7.342E+22, /* mass (kg) */
    362600, /* perigee (km) */
    1737.1, /* radius (km) */
    "earth", /* satelliteOf */
    "29d 12h 44m 2.9s", /* synodicPeriod */
    390, /* tempMax (k) */
    100, /* tempMin (k) */
    2.1958E+10 /* volume (km^3) */
);

INSERT INTO moons
VALUES (
    "phobos", /* name */
    9517.58, /* apogee (km) */
    0, /* axialTilt (deg) */
    1.876, /* density (g/cm) */
    "Asaph Hall", /* discoveredBy (names) */
    1877, /* discoveredWhen (year) */
    0.0151, /* eccentricity */
    "Greek god of fear", /* god */
    0.0057, /* gravity (m/s^2) */
    26.04, /* inclination (deg) */
    "7h 39.2m", /* orbitalPeriod */
    2.138, /* orbitalSpeed (km/s) */
    1.0659E+16, /* mass (kg) */
    9234.42, /* perigee (km) */
    11.2667, /* radius (km) */
    "mars", /* satelliteOf */
    "0.3191d", /* synodicPeriod */
    233, /* tempMax (k) */
    233, /* tempMin (k) */
    5783.61 /* volume (km^3) */
);

INSERT INTO moons
VALUES (
    "deimos", /* name */
    23470.9, /* apogee (km) */
    null, /* axialTilt (deg) */
    1.471, /* density (g/cm) */
    "Asaph Hall", /* discoveredBy (names) */
    1877, /* discoveredWhen (year) */
    0.00033, /* eccentricity */
    "Greek god of terror", /* god */
    0.003, /* gravity (m/s^2) */
    27.58, /* inclination (deg) */
    "1.263d", /* orbitalPeriod */
    1.3513, /* orbitalSpeed (km/s) */
    1.4762E+15, /* mass (kg) */
    23455.5, /* perigee (km) */
    6.2, /* radius (km) */
    "mars", /* satelliteOf */
    "1.2648d", /* synodicPeriod */
    233, /* tempMax (k) */
    233, /* tempMin (k) */
    5783.61 /* volume (km^3) */
);

INSERT INTO moons
VALUES (
    "io", /* name */
    423400, /* apogee (km) */
    null, /* axialTilt (deg) */
    3.528, /* density (g/cm) */
    "Galileo Galilei", /* discoveredBy (names) */
    1610, /* discoveredWhen (year) */
    0.0041, /* eccentricity */
    "An Argive princess", /* god */
    1.796, /* gravity (m/s^2) */
    2.213, /* inclination (deg) */
    "152853.5047s", /* orbitalPeriod */
    17.334, /* orbitalSpeed (km/s) */
    8.931938E+22, /* mass (kg) */
    420000, /* perigee (km) */
    1821.6, /* radius (km) */
    "jupiter", /* satelliteOf */
    "152853.5047s", /* synodicPeriod */
    130, /* tempMax (k) */
    90, /* tempMin (k) */
    2.53E+10 /* volume (km^3) */
);

INSERT INTO moons
VALUES (
    "europa", /* name */
    676938, /* apogee (km) */
    0.1, /* axialTilt (deg) */
    3.013, /* density (g/cm) */
    "Galileo Galilei", /* discoveredBy (names) */
    1610, /* discoveredWhen (year) */
    0.009, /* eccentricity */
    "Phoenician mother of King Minos of Crete", /* god */
    1.314, /* gravity (m/s^2) */
    1.791, /* inclination (deg) */
    "3.551181d", /* orbitalPeriod */
    13.740, /* orbitalSpeed (km/s) */
    4.799844E+22, /* mass (kg) */
    664862, /* perigee (km) */
    1560.8, /* radius (km) */
    "jupiter", /* satelliteOf */
    "3.551181d", /* synodicPeriod */
    125, /* tempMax (k) */
    50, /* tempMin (k) */
    1.593E+10 /* volume (km^3) */
);

INSERT INTO moons
VALUES (
    "ganymede", /* name */
    1071600, /* apogee (km) */
    0.33, /* axialTilt (deg) */
    1.936, /* density (g/cm) */
    "Galileo Galilei", /* discoveredBy (names) */
    1610, /* discoveredWhen (year) */
    0.0013, /* eccentricity */
    "A divine hero and the most beautiful of all mortals", /* god */
    1.428, /* gravity (m/s^2) */
    2.214, /* inclination (deg) */
    "7.15455296d", /* orbitalPeriod */
    10.880, /* orbitalSpeed (km/s) */
    1.4819E+23, /* mass (kg) */
    1069200, /* perigee (km) */
    2634.1, /* radius (km) */
    "jupiter", /* satelliteOf */
    "7.15455296d", /* synodicPeriod */
    152, /* tempMax (k) */
    70, /* tempMin (k) */
    7.66E+10 /* volume (km^3) */
);

INSERT INTO moons
VALUES (
    "callisto", /* name */
    1897000, /* apogee (km) */
    0, /* axialTilt (deg) */
    1.8344, /* density (g/cm) */
    "Galileo Galilei", /* discoveredBy (names) */
    1610, /* discoveredWhen (year) */
    0.0074, /* eccentricity */
    "daughter of King Lycaon", /* god */
    1.235, /* gravity (m/s^2) */
    2.017, /* inclination (deg) */
    "16.6890184d", /* orbitalPeriod */
    8.204, /* orbitalSpeed (km/s) */
    1.075938E+23, /* mass (kg) */
    1869000, /* perigee (km) */
    2410.3, /* radius (km) */
    "jupiter", /* satelliteOf */
    "16.6890184d", /* synodicPeriod */
    170, /* tempMax (k) */
    75, /* tempMin (k) */
    5.9E+10 /* volume (km^3) */
);

INSERT INTO moons
VALUES (
    "mimas", /* name */
    189176, /* apogee (km) */
    0, /* axialTilt (deg) */
    1.1479, /* density (g/cm) */
    "William Herschel", /* discoveredBy (names) */
    1789, /* discoveredWhen (year) */
    0.0196, /* eccentricity */
    "one of the 7 giants in Greek mythology", /* god */
    0.064, /* gravity (m/s^2) */
    1.574, /* inclination (deg) */
    "0.942d", /* orbitalPeriod */
    14.28, /* orbitalSpeed (km/s) */
    3.7493E+19, /* mass (kg) */
    181902, /* perigee (km) */
    198.2, /* radius (km) */
    "saturn", /* satelliteOf */
    "0.942d", /* synodicPeriod */
    64, /* tempMax (k) */
    64, /* tempMin (k) */
    32600000 /* volume (km^3) */
);

INSERT INTO moons
VALUES (
    "enceladus", /* name */
    239156, /* apogee (km) */
    0, /* axialTilt (deg) */
    1.609, /* density (g/cm) */
    "William Herschel", /* discoveredBy (names) */
    1789, /* discoveredWhen (year) */
    0.0047, /* eccentricity */
    "one of the 7 giants in Greek mythology", /* god */
    0.113, /* gravity (m/s^2) */
    2.494, /* inclination (deg) */
    "1.370218d", /* orbitalPeriod */
    12.63536111, /* orbitalSpeed (km/s) */
    1.080E+20, /* mass (kg) */
    236918, /* perigee (km) */
    252.1, /* radius (km) */
    "saturn", /* satelliteOf */
    "1.370218d", /* synodicPeriod */
    145, /* tempMax (k) */
    33, /* tempMin (k) */
    67113076 /* volume (km^3) */
);

INSERT INTO moons
VALUES (
    "tethys", /* name */
    294672, /* apogee (km) */
    0, /* axialTilt (deg) */
    0.984, /* density (g/cm) */
    "Giovanni Domenico Cassini", /* discoveredBy (names) */
    1684, /* discoveredWhen (year) */
    0.0001, /* eccentricity */
    "Greek titan daughter of Uranus and Gaia", /* god */
    0.146, /* gravity (m/s^2) */
    3.605, /* inclination (deg) */
    "1.887802d", /* orbitalPeriod */
    11.35, /* orbitalSpeed (km/s) */
    6.17449E+20, /* mass (kg) */
    294672, /* perigee (km) */
    531.1, /* radius (km) */
    "saturn", /* satelliteOf */
    "1.887802d", /* synodicPeriod */
    87, /* tempMax (k) */
    85, /* tempMin (k) */
    634264255 /* volume (km^3) */
);

INSERT INTO moons
VALUES (
    "dione", /* name */
    377415, /* apogee (km) */
    0, /* axialTilt (deg) */
    1.478, /* density (g/cm) */
    "Giovanni Domenico Cassini", /* discoveredBy (names) */
    1684, /* discoveredWhen (year) */
    0.0022, /* eccentricity */
    "Titan oceanid goddess in Greek mythology", /* god */
    0.232, /* gravity (m/s^2) */
    2.504, /* inclination (deg) */
    "2.736915d", /* orbitalPeriod */
    10.02788889, /* orbitalSpeed (km/s) */
    1.095452E+21, /* mass (kg) */
    377415, /* perigee (km) */
    561.4, /* radius (km) */
    "saturn", /* satelliteOf */
    "2.736915d", /* synodicPeriod */
    87, /* tempMax (k) */
    87, /* tempMin (k) */
    742338322 /* volume (km^3) */
);

INSERT INTO moons
VALUES (
    "rhea", /* name */
    527068, /* apogee (km) */
    0, /* axialTilt (deg) */
    1.236, /* density (g/cm) */
    "Giovanni Domenico Cassini", /* discoveredBy (names) */
    1672, /* discoveredWhen (year) */
    0.0012583, /* eccentricity */
    "Greek titan mother of the gods", /* god */
    0.264, /* gravity (m/s^2) */
    2.83, /* inclination (deg) */
    "4.518212d", /* orbitalPeriod */
    8.48, /* orbitalSpeed (km/s) */
    2.306518E+21, /* mass (kg) */
    527068, /* perigee (km) */
    764.3, /* radius (km) */
    "saturn", /* satelliteOf */
    "4.518212d", /* synodicPeriod */
    99, /* tempMax (k) */
    53, /* tempMin (k) */
    1870166133 /* volume (km^3) */
);

INSERT INTO moons
VALUES (
    "titan", /* name */
    1257060, /* apogee (km) */
    0, /* axialTilt (deg) */
    1.8798, /* density (g/cm) */
    "Christiaan Huygens", /* discoveredBy (names) */
    1655, /* discoveredWhen (year) */
    0.0288, /* eccentricity */
    "Greek mythological titans", /* god */
    1.352, /* gravity (m/s^2) */
    2.83354, /* inclination (deg) */
    "15.945d", /* orbitalPeriod */
    5.57, /* orbitalSpeed (km/s) */
    1.3452E+23, /* mass (kg) */
    1186680, /* perigee (km) */
    2574.73, /* radius (km) */
    "saturn", /* satelliteOf */
    "15.945d", /* synodicPeriod */
    94, /* tempMax (k) */
    94, /* tempMin (k) */
    7.16E+10 /* volume (km^3) */
);

INSERT INTO moons
VALUES (
    "iapetus", /* name */
    3560851, /* apogee (km) */
    0, /* axialTilt (deg) */
    1.088, /* density (g/cm) */
    "Giovanni Domenico Cassini", /* discoveredBy (names) */
    1671, /* discoveredWhen (year) */
    0.0276812, /* eccentricity */
    "Greek titan son of Uranus and Gaea", /* god */
    0.223, /* gravity (m/s^2) */
    17.28, /* inclination (deg) */
    "79.3215d", /* orbitalPeriod */
    3.26, /* orbitalSpeed (km/s) */
    1.805635E+21, /* mass (kg) */
    3560851, /* perigee (km) */
    2574.73, /* radius (km) */
    "saturn", /* satelliteOf */
    "79.3215d", /* synodicPeriod */
    130, /* tempMax (k) */
    90, /* tempMin (k) */
    1667300080 /* volume (km^3) */
);

INSERT INTO moons
VALUES (
    "miranda", /* name */
    129900, /* apogee (km) */
    0, /* axialTilt (deg) */
    1.20, /* density (g/cm) */
    "Gerard P. Kuiper", /* discoveredBy (names) */
    1948, /* discoveredWhen (year) */
    0.0013, /* eccentricity */
    "Character in The Tempest by Shakespeare", /* god */
    0.079, /* gravity (m/s^2) */
    102.002, /* inclination (deg) */
    "1.413479d", /* orbitalPeriod */
    3.26, /* orbitalSpeed (km/s) */
    1.805635E+21, /* mass (kg) */
    129900, /* perigee (km) */
    2574.73, /* radius (km) */
    "uranus", /* satelliteOf */
    "1.413479d", /* synodicPeriod */
    85, /* tempMax (k) */
    60, /* tempMin (k) */
    54918670 /* volume (km^3) */
);

INSERT INTO moons
VALUES (
    "ariel", /* name */
    190900, /* apogee (km) */
    0, /* axialTilt (deg) */
    1.592, /* density (g/cm) */
    "William Lassell", /* discoveredBy (names) */
    1851, /* discoveredWhen (year) */
    0.0012, /* eccentricity */
    "The sky spirit in The Rape of the Lock by Alexander Pope", /* god */
    0.079, /* gravity (m/s^2) */
    98.03, /* inclination (deg) */
    "2.520d", /* orbitalPeriod */
    5.51, /* orbitalSpeed (km/s) */
    1.25E+21, /* mass (kg) */
    190900, /* perigee (km) */
    578.9, /* radius (km) */
    "uranus", /* satelliteOf */
    "2.520d", /* synodicPeriod */
    85, /* tempMax (k) */
    60, /* tempMin (k) */
    812600000 /* volume (km^3) */
);

INSERT INTO moons
VALUES (
    "umbriel", /* name */
    266000, /* apogee (km) */
    0, /* axialTilt (deg) */
    1.39, /* density (g/cm) */
    "William Lassell", /* discoveredBy (names) */
    1851, /* discoveredWhen (year) */
    0.0039, /* eccentricity */
    "The dusky melancholy sprite in The Rape of the Lock by Alexander Pope", /* god */
    0.2, /* gravity (m/s^2) */
    97.898, /* inclination (deg) */
    "2.520d", /* orbitalPeriod */
    5.51, /* orbitalSpeed (km/s) */
    1.25E+21, /* mass (kg) */
    266000, /* perigee (km) */
    578.9, /* radius (km) */
    "uranus", /* satelliteOf */
    "2.520d", /* synodicPeriod */
    85, /* tempMax (k) */
    60, /* tempMin (k) */
    812600000 /* volume (km^3) */
);

INSERT INTO moons
VALUES (
    "titania", /* name */
    436300, /* apogee (km) */
    null, /* axialTilt (deg) */
    1.711, /* density (g/cm) */
    "William Herschel", /* discoveredBy (names) */
    1787, /* discoveredWhen (year) */
    0.0011, /* eccentricity */
    "The queen of faries in A Midsummer Night's Dream by Shakespeake", /* god */
    0.379, /* gravity (m/s^2) */
    98.11, /* inclination (deg) */
    "8.706234d", /* orbitalPeriod */
    3.64, /* orbitalSpeed (km/s) */
    3.4E+21, /* mass (kg) */
    436300, /* perigee (km) */
    788.4, /* radius (km) */
    "uranus", /* satelliteOf */
    "8.706234d", /* synodicPeriod */
    89, /* tempMax (k) */
    60, /* tempMin (k) */
    2065000000 /* volume (km^3) */    
);

INSERT INTO moons
VALUES (
    "oberon", /* name */
    583500, /* apogee (km) */
    null, /* axialTilt (deg) */
    1.63, /* density (g/cm) */
    "William Herschel", /* discoveredBy (names) */
    1787, /* discoveredWhen (year) */
    0.0014, /* eccentricity */
    "The king of faries in A Midsummer Night's Dream by Shakespeake", /* god */
    0.346, /* gravity (m/s^2) */
    97.828, /* inclination (deg) */
    "13.463234d", /* orbitalPeriod */
    3.15, /* orbitalSpeed (km/s) */
    3.076E+21, /* mass (kg) */
    583500, /* perigee (km) */
    761.4, /* radius (km) */
    "uranus", /* satelliteOf */
    "13.463234d", /* synodicPeriod */
    80, /* tempMax (k) */
    70, /* tempMin (k) */
    1848958769 /* volume (km^3) */    
);

INSERT INTO moons
VALUES (
    "triton", /* name */
    354759, /* apogee (km) */
    0, /* axialTilt (deg) */
    2.061, /* density (g/cm) */
    "William Lassell", /* discoveredBy (names) */
    1846, /* discoveredWhen (year) */
    0.000016, /* eccentricity */
    "The son of the Greek god Poseidon", /* god */
    0.779, /* gravity (m/s^2) */
    129.812, /* inclination (deg) */
    "5.876854d", /* orbitalPeriod */
    4.39, /* orbitalSpeed (km/s) */
    2.14E+22, /* mass (kg) */
    354759, /* perigee (km) */
    1353.4, /* radius (km) */
    "uranus", /* satelliteOf */
    "5.876854d", /* synodicPeriod */
    38, /* tempMax (k) */
    38, /* tempMin (k) */
    10384058491 /* volume (km^3) */    
);