using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Text_Adventure_Shrek
{
    class Location : Program
    {
        public string Name { get; set; }
        public string Weather { get; set; }
        public string Area { get; set; }
        public Location(string name, string area, string weather)

        {
            Weather = weather;
            Area = area;
            Name = name;
        }
        public string Describe()
        {
            //TODO Maak een omschrijving van de locatie mbv Name, Weather en Area
            string description = $"You are now at the {Name}. This area is {Area} and the weather here is {Weather}";
            return description; 
        }
    } 
}
