[![Build Status](https://travis-ci.org/MuhClaren/timeago.svg?branch=master)](https://travis-ci.org/MuhClaren/timeago)
[![Code Quality](https://img.shields.io/scrutinizer/g/MuhClaren/timeago.svg?style=flat)](https://travis-ci.org/MuhClaren/timeago)

TimeAgo - A phpBB 3.1 extension
-------------------------------
**Extension Version:** 1.4.0b    
**Requirements:** PHP 5.3. phpBB 3.1.x  
**Author:** MuhClaren  

**Extension Description:** This extension changes the phpBB native date-time to a Time Ago format. Example: (Before) Saturday, January 1. 1984 (After) 8 Months, 2 Weeks, 3 Days Ago.  

**Screenshots:**  
[TimeAgo Settings](https://www.imageforge.us/image/6OeW1)  
[Example viewforum](https://www.imageforge.us/image/12Rf)  
[Example viewforum](https://www.imageforge.us/image/1NZX)  
[Example viewtopic](https://www.imageforge.us/image/1LcW)  

**Language Support:** ar, cs, de, en, en_us, es, it, nl, tr. Language contributions are appreciated.  

**Translators:**  
Arabic (AR): [Alhitary](https://www.phpbb.com/community/memberlist.php?mode=viewprofile&u=294346)  
Czech (CS): [R3gi](https://www.phpbb.com/community/memberlist.php?mode=viewprofile&u=1407131)  
German (DE): [Miri4Ever](https://www.phpbb.com/community/memberlist.php?mode=viewprofile&u=1467791)  
Español (ES): Raul [ThE KuKa](https://www.phpbb.com/community/memberlist.php?mode=viewprofile&u=94590)  
Dutch (NL): [Svennson](https://www.phpbb.com/community/memberlist.php?mode=viewprofile&u=187939)  
Italian (IT): [Sakkiotto](https://www.phpbb.com/community/memberlist.php?mode=viewprofile&u=190154)  
Turkish (TR): [Cycling](https://www.phpbb.com/community/memberlist.php?mode=viewprofile&u=1506201)  

**Highlights:**  
 - Compatible with all styles that use the native phpBB timestamp template tags
 - 100% PHP, no Javascript or template editing necessary 
 - Three (3) adjustable levels of detail 
 - Support for times from Seconds through Decades 
 - Configurable display options for Index.php, viewforum.php, viewtopic.php 
 - "Extended" detail option appends phpBB native timestamp to the end of the TimeAgo output
 - Automatically adapts for proper word order for non-English languages
 - Definable de-activation timer to display native phpBB date-time on posts older than set number of days 

**Quickstart:**  
*Install:* Extract the archive to the following folders in your extensions directory tree: /mop/timeago (final path looks like this: /ext/mop/timeago/).   
*Enable:* ACP --> Customise --> locate TimeAgo extension in the list, click enable.  
*Configure:* Configuration options are available from the "Extensions" tab, TimeAgo General Settings.  

**History:**   
v1.4.0 Change Log:  
 - [UPGRADE] Support added for Paybas 'Recent Topics' extension  
 - [FIX] Updated incomplete translation  
 - [FIX] Minor UI issue (placement of checkbox element)  
 - [QA] Add support for Turkish language  
 - [QA] Clean, simplify, optimize core methods  
 
v1.3.1 Change Log:  
 - [FEATURE] Timer setting to revert back to native output after *n* days
 - [FIX] Support for language word order (i.e.  placement of 'ago')  
 - [FIX] Index.php - check for posts to determine output  
 - [QA] Add support for travis-ci and EPV (Extension Pre Validator) testing

NOTES: Any translations which require non-English word order of the TimeAgo output string, the translator should notify me of such requirements when submitting the translation.

OPTIONAL: Native phpBB date-time output can be customized: ACP --> General --> Board Settings --> Date Format: custom. Edit the string to your required specifications. You'll need to push this custom setting to the users, too, since it's not set to custom by default at installation. Please note that this is optional, and not required for TimeAgo to function.
