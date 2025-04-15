<?php
$request_url=str_replace('/dutch-version','',$_SERVER['REQUEST_URI']);
//$request_url=$_SERVER['REQUEST_URI'];
if ($request_url == '/') {
	$metatitle = "Hotels in Suriname, Paramaribo | Greenheart Boutique Hotel Suriname | Resorts in Suriname";
    $metadesc = "Experience elegance in Suriname at Greenheart Boutique Hotel, crafted with Surinamese hardwood. Unparalleled beauty in every detail, a luxurious escape in Paramaribo Book Now!";
	$keywords = "Best Hotel in Suriname,Eco-friendly Hotel in Suriname, Hotels in Paramaribo, Hotel in Suriname";	} 
elseif ($request_url == '/history.php') {
	$metatitle = "Surinam Hotel | Greenheart Boutique Hotel Suriname | Hotel History";
    $metadesc = "Immerse in history at Greenheart Boutique Hotel, Suriname's gem with a charming eco touch. Crafted from Surinamese hardwood, experience luxury in the heart of historic Paramaribo.";
	$keywords = "Hotel in Paramaribo, Hotel in Suriname, nature resorts in suriname";
	}
elseif ($request_url == '/rooms.php') {
	$metatitle = "Accommodation in Suriname | Greenheart Boutique Hotel Suriname | Hotel Booking Paramaribo";
    $metadesc = "Book your stay at Greenheart Boutique Hotel, the epitome of luxury in Suriname. Experience the best accommodation in South America, nestled in the heart of Paramaribo.";
	$keywords = "Best place to Stay In Suriname,Ecofriendly Stay In paramaribo-Suriname, Eco Resort Suriname, Best hotel in Paramaribo, hotel booking Paramaribo";
}
elseif ($request_url == '/dine.php') {
	$metatitle = "Best Restaurant in Suriname | Greenheart Boutique Hotel Suriname | Restaurants in Paramaribo";
    $metadesc = "Savor exquisite moments at Greenheart Boutique Hotel, home to the finest restaurant in Suriname. Indulge in unparalleled fine dining experiences in the heart of Paramaribo Reserve Your Table Now!";
	$keywords = "Best place to eat in Suriname, paramaribo restaurants, Fine dining in Paramaribo, restaurants in Paramaribo";
}
elseif ($request_url == '/event.php') {
	$metatitle = "Event in Suriname | Greenheart Boutique Hotel Suriname | Events in Paramaribo";
    $metadesc = "Create unforgettable moments at Greenheart Boutique Hotel in Suriname. The perfect venue for weddings, parties, and events in the heart of Paramaribo.";
	$keywords = "";
}
elseif ($request_url == '/service-and-facilities.php') {
	$metatitle = "Eco Resort Suriname | Greenheart Boutique Hotel Suriname | Hotel With Swimming Pool in Suriname";
    $metadesc = "Dive into eco-luxury at Greenheart Boutique Hotel, the premier eco resort in Suriname. Enjoy top-notch service and facilities, including a refreshing swimming pool experience.";
	$keywords = "Best Hotel Services in Suriname,Best Eco-Friendly Hotel Services In Paramaribo,hotels near Waterkant Paramaribo, Suriname all inclusive resorts, hotel with swimming pool in Suriname";
}
elseif ($request_url == '/nature-packages.php') {
	$metatitle = "Nature Resorts in Suriname | Greenheart Boutique Hotel Suriname | Hotel packages in Suriname, Paramaribo";
    $metadesc = "Escape to nature at Greenheart Boutique Hotel, one of Suriname's top nature resorts. Explore enticing hotel packages in the heart of Paramaribo for an unforgettable stay.";
	$keywords = "best hotels in suriname, eco resort suriname, hotel in paramaribo, hotels paramaribo";
}
elseif ($request_url == '/gallery.php') {
	$metatitle = "Hotel Gallery | Greenheart Boutique Hotel Suriname | Suriname Hostels";
    $metadesc = "Immerse in elegance through our Hotel Gallery at Greenheart Boutique Hotel in Suriname. Redefining luxury amidst the charm of Suriname hostels.";
	$keywords = "eco-Friendly Hotel,Photos of hotel in Paramaribo, hotel in Paramaribo, hotel in Suriname";
}
elseif ($request_url == '/contact.php') {
	$metatitle = "Contact us | Greenheart Boutique Hotel Suriname | Hotel & Resorts in Suriname, Paramaribo";
    $metadesc = "Connect with Greenheart Boutique Hotel Suriname. Your gateway to exceptional hospitality awaits. Contact us for an enriching experience in Suriname, Paramaribo.";
	$keywords = "hotel in paramaribo, best hotel in Paramaribo, eco resort suriname, hotels in paramaribo suriname";
}
?>