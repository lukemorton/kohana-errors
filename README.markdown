# Kohana Errors

Inspired by [Errorist](https://github.com/ThePixelDeveloper/kohana-bits-and-bobs/tree/master/modules/errorist)
this is a simple solution for handling exceptions and rendering
a user friendly error screen.

By default 404 and 500 errors are handled.

**Kohana 3.1 + compatible**

## Error Handling

When an action or controller cannot be found
Controller_Error::action_404 will be served instead. You can
customise the behaviour of this action by extending
Kohana_Controller_Error.

All other errors will be served as 500 and therefore
Controller_Error::action_500 will be used to serve a response.

You can also throw a Http_Exception for any status code,
although only 404 and 500 errors have an action defined.

You don't have to extend Kohana_Controller_Error to customise
the error response however. You can simply make your own custom
view. "views/error/404.php" and "views/error/500.php" will
be loaded by default. You can replace these files in your
application if you wish to without needing to update any
controllers.

## Warning

Currently due to the way the catch all route works you must
define all your application routes before you call
`Kohana::modules` in your bootstrap.php.

## Prophet

These files were originally part of [Prophet](https://github.com/DrPheltRight/Prophet), an auto view
loader, however since I needed to handle errors in another app
but didn't need Prophet I have since separated the repos.

# Author

Luke Morton, 2011.

# License

MIT Licensed.