<?php
/**
 * Copyright (c) 2017, Willem Van Iseghem (canihavesomecoffee) <theTVDbAPI@canihavesome.coffee>
 *
 * Permission to use, copy, modify, and/or distribute this software for any purpose with or without fee is hereby
 * granted, provided that the above copyright notice and this permission notice appear in all copies.
 *
 * THE SOFTWARE IS PROVIDED "AS IS" AND THE AUTHOR DISCLAIMS ALL WARRANTIES WITH REGARD TO THIS SOFTWARE INCLUDING ALL
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS. IN NO EVENT SHALL THE AUTHOR BE LIABLE FOR ANY SPECIAL, DIRECT,
 * INDIRECT, OR CONSEQUENTIAL DAMAGES OR ANY DAMAGES WHATSOEVER RESULTING FROM LOSS OF USE, DATA OR PROFITS, WHETHER
 * IN AN ACTION OF CONTRACT, NEGLIGENCE OR OTHER TORTIOUS ACTION, ARISING OUT OF OR IN CONNECTION WITH THE USE OR
 * PERFORMANCE OF THIS SOFTWARE.
 *
 * Interface for the theTVDbAPI client.
 *
 * PHP version 8.4
 *
 * @category TheTVDbAPI
 * @package  spiritualized\TheTVDbAPI
 * @author   Willem Van Iseghem (canihavesomecoffee) <theTVDbAPI@canihavesome.coffee>
 * @license  See start of document
 * @link     https://canihavesome.coffee/projects/theTVDbAPI
 */
declare(strict_types = 1);

namespace spiritualized\TheTVDbAPI;

use spiritualized\TheTVDbAPI\Route\AuthenticationRoute;
use spiritualized\TheTVDbAPI\Route\EpisodesRoute;
use Exception;
use Psr\Http\Message\ResponseInterface;
use spiritualized\TheTVDbAPI\Exception\ParseException;
use spiritualized\TheTVDbAPI\Exception\ResourceNotFoundException;
use spiritualized\TheTVDbAPI\Exception\UnauthorizedException;
use spiritualized\TheTVDbAPI\Route\ArtworkRoute;
use spiritualized\TheTVDbAPI\Route\LanguagesRoute;
use spiritualized\TheTVDbAPI\Route\SearchRoute;
use spiritualized\TheTVDbAPI\Route\SeriesRoute;
use spiritualized\TheTVDbAPI\Route\UpdatesRoute;

/**
 * Interface TheTVDbAPIInterface
 *
 * @category TheTVDbAPI
 * @package  spiritualized\TheTVDbAPI
 * @author   Willem Van Iseghem (canihavesomecoffee) <theTVDbAPI@canihavesome.coffee>
 * @license  See start of document
 * @link     https://canihavesome.coffee/projects/theTVDbAPI
 */
interface TheTVDbAPIInterface
{


    /**
     * Sets the authentication token.
     *
     * @param string|null $token A valid token.
     *
     * @return void
     */
    public function setToken(?string $token = null);

    /**
     * Get authentication extension
     *
     * @return AuthenticationRoute
     */
    public function authentication(): AuthenticationRoute;

    /**
     * Get language extension
     *
     * @return LanguagesRoute
     */
    public function languages(): LanguagesRoute;

    /**
     * Get episodes extension
     *
     * @return EpisodesRoute
     */
    public function episodes(): EpisodesRoute;

    /**
     * Get series extension
     *
     * @return SeriesRoute
     */
    public function series(): SeriesRoute;

    /**
     * Get search extension
     *
     * @return SearchRoute
     */
    public function search(): SearchRoute;

    /**
     * Get updates extension
     *
     * @return UpdatesRoute
     */
    public function updates(): UpdatesRoute;

    /**
     * Get artwork extension
     *
     * @return ArtworkRoute
     */
    public function artwork(): ArtworkRoute;

    /**
     * Makes a call to the API and return headers only.
     *
     * @param string $method  HTTP Method (post, getUserData, put, etc.)
     * @param string $path    Path to the API call
     * @param array  $options HTTP Client options
     *
     * @return array
     * @throws UnauthorizedException
     * @throws ResourceNotFoundException
     */
    public function requestHeaders(string $method, string $path, array $options = []): array;

    /**
     * Perform an API call to theTVDb.
     *
     * @param string $method  HTTP Method (post, getUserData, put, etc.)
     * @param string $path    Path to the API call
     * @param array  $options HTTP Client options
     *
     * @return ResponseInterface
     * @throws UnauthorizedException
     * @throws ResourceNotFoundException
     */
    public function performAPICall(string $method, string $path, array $options = []): ResponseInterface;

    /**
     * Perform an API call to theTVDb and return a JSON response
     *
     * @param string $method  HTTP Method (post, getUserData, put, etc.)
     * @param string $path    Path to the API call
     * @param array  $options HTTP Client options
     *
     * @return mixed
     * @throws ParseException
     * @throws UnauthorizedException
     * @throws ResourceNotFoundException
     * @throws Exception
     */
    public function performAPICallWithJsonResponse(string $method, string $path, array $options = []);

    /**
     * Return the primary language to get translations for.
     *
     * @return string
     */
    public function getPrimaryLanguage(): string;

    /**
     * Return the secondary fallback language.
     *
     * @return string
     */
    public function getSecondaryLanguage(): string;


}
