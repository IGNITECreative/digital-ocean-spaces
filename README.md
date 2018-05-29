# Digital Ocean Spaces plugin for Craft CMS 3.x

A Volume Plugin that interacts with Digital Ocean Spaces 

## Requirements

This plugin requires Craft CMS 3.0.0 or later.

## Installation

To install the plugin, follow these instructions.

1. Open your terminal and go to your Craft project:

        cd /path/to/project

2. Then tell Composer to load the plugin:

        composer require IGNITECreative/digital-ocean-spaces

3. In the Control Panel, go to Settings → Plugins and click the “Install” button for Digital Ocean Spaces.

## Setup

To create a new asset volume for your Digital Ocean Space, go to Settings → Assets, create a new volume, and set the Volume Type setting to “Digital Ocean Space”. Be sure to select 'Assets in this volume have public URLs' and enter in your complete Digital Ocean Space URL, such as 

		//[Space Name].[Region].digitaloceanspaces.com
