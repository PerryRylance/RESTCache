# DataTable

This library handles client and server side record fetching, including search, sort and pagination.

This is the client side component. Feel free to write your own, or extend `PerryRylance.DataTable` by overriding `createInstance`.

If you're looking for the server side library, please see <https://github.com/PerryRylance/DataTable>

## Requirements

- jQuery

## Installation

I recommend installing this via NPM:

`composer require perry-rylance/datatable`

## Usage

- Use import or require to load the module
- You can let the module take care of everything

## Integration

- You can simply use the DataTable (native) JS interface to interact via the table element and let this library handle the communication.
- If you wish to implement custom behaviour, please make a class which extends DataTable, and then override DataTable.createInstance to return an instance of your class.