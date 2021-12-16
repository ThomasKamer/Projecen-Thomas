using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Text_Adventure_Shrek
{

    using System;
    using System.Collections;
    class Inventory
    {

        string Name;
        string Color;
        string Usage;

        public Inventory(string name, string color, string usage)
        {
            Name = name;
            Color = color;
            Usage = usage;
        }
    }
    public class InventoryList
    {
        public static ArrayList inv = new ArrayList();

        public static void ShowInventory()
        {

            Console.WriteLine("Your Backpack Contains:");
            foreach (string i in inv)
            {
                Console.WriteLine("  " + i);
            }
        }

        public static void AddItem(string itemName)
        {
            inv.Add(itemName);
        }

        public static void RemoveItem(string itemName)
        {
            inv.Remove(itemName);
        }

        public static bool CheckInventory(string itemName)
        {
            return inv.Contains(itemName);
        }
    }
}