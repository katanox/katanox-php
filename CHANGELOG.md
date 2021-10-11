# Changelog

All notable changes to `katanox-php` will be documented in this file.

Updates should follow the [Keep a CHANGELOG](https://keepachangelog.com/) principles.

## [3.2.0] - 2021-10-11
### Changed
- The expiry year should now be a 4 digit number

## [3.1.1] - 2021-09-29
### Changed
- Resource url is now a variable instead of const

## [3.1.0] - 2021-09-29
### Bugfix
- Include parameters of AvailabilityQuery are now used as expected in query string
- Change `post_code` to `postcode` in query string when searching availability
### Changed
- Validation removed from following fields:
 - Payment.type
 - Resevation.rate_plan_id
 - Resevation.unit_id
- KatanoxRequest uses `static::BASE_URL` instead of `self::BASE_URL`
- Booking.price is a `Price` object instead of `float`

## [3.0.1] - 2021-09-20
### Bugfix
- Property Ids in AvailabilityQuery are now properly used as query parameters
### Changed
- Lat and Lng are not required if Property Ids are set in AvailabilityQuery

## [3.0.0] - 2021-09-16
### Changed
 - The KatanoxAPI class doesn't need the isSandbox boolean in its constructor since there is no need for a separate endpoint anymore.
 - The Booking Resource now sends the bookings via the PCI Proxy url to ensure PCI Compliance

## [2.0.0] - 2021-08-20
### Added
- Github Actions workflow

### Changed
- Minimum PHP version to 7.4
- Models now use getters and setters instead of publicly accessible fields

## [1.0.0] - 2021-08-18
### Added
- Availability Resource
- Booking Resource
- Property Resource

